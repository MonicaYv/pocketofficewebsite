<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesEnquiry;
use Illuminate\Support\Facades\Mail;

class SalesEnquiryController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'companyName' => 'required|string|max:255',
            'industry' => 'required',
            'firstName' => 'required|string|max:100',
            'lastName' => 'required|string|max:100',
            'phoneNumber' => 'required',
            'email' => 'required|email',
            'website' => 'nullable|url',
            'companyAddress' => 'required',
            'country' => 'required',
            'city' => 'required',
        ]);

        SalesEnquiry::create([
            'company_name' => $request->companyName,
            'industry' => $request->industry,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'country_code' => $request->countryCodes,
            'phone_number' => $request->phoneNumber,
            'email' => $request->email,
            'website' => $request->website,
            'company_address' => $request->companyAddress,
            'country' => $request->country,
            'city' => $request->city,
            'services' => json_encode($request->services),
            'message' => $request->message,
        ]);

        //Send to admin
        Mail::send(
            'mail-templates.mail-template',
            [
                'type' => 'admin',
                'name' => 'Admin',
                'companyName' => $request->companyName,
                'industry' => $request->industry,
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'phone' => $request->countryCodes . ' ' . $request->phoneNumber,
                'email' => $request->email,
                'website' => $request->website,
                'address' => $request->companyAddress,
                'country' => $request->country,
                'city' => $request->city,
                'services' => $request->services,
                'userMessage' => $request->message,
            ],
            function ($message) use ($request) {
                $message->to('officelescloud@gmail.com');
                $message->replyTo($request->email);
                $message->subject('New Sales Enquiry');
            }
        );

        //Send to user
        Mail::send(
            'mail-templates.mail-template',
            [
                'type' => 'user',
                'name' => $request->firstName,
            ],
            function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('We received your enquiry');
            }
        );

        return response()->json([
            'status' => true,
            'message' => 'Sales enquiry submitted successfully'
        ]);
    }
}

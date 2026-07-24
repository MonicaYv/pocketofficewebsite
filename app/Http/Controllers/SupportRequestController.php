<?php

namespace App\Http\Controllers;

use App\Models\SupportRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SupportRequestController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'department' => ['required', 'string', 'max:100'],
            'customerId' => ['required', 'string', 'max:100'],
            'name' => ['required', 'string', 'max:255'],
            'countryCodes' => ['required', 'string', 'max:20'],
            'phoneNumber' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
            'attachments' => ['nullable', 'array'],
            'attachments.*' => ['file', 'mimes:pdf,jpg,jpeg,png,doc,docx,txt', 'max:2048'],
        ]);

        $attachmentPaths = [];

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $attachment) {
                $attachmentPaths[] = $attachment->store('support-requests', 'public');
            }
        }

        SupportRequest::create([
            'department' => $validated['department'],
            'customer_id' => $validated['customerId'],
            'name' => $validated['name'],
            'country_code' => $validated['countryCodes'],
            'phone_number' => $validated['phoneNumber'],
            'email' => $validated['email'],
            'message' => $validated['message'],
            'attachment_paths' => $attachmentPaths ?: null,
            'status' => 'new',
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Support request submitted successfully',
        ]);
    }
}

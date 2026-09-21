<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:15'],
            'position' => ['required', 'string', 'max:255'],
            'portfolio' => ['nullable', 'string', 'max:2048'],
            'message' => ['nullable', 'string', 'max:5000'],
            'jobSlug' => ['nullable', 'string', 'max:255'],
            'jobTitle' => ['nullable', 'string', 'max:255'],
            'resume' => ['required', 'file', 'mimes:pdf', 'max:2048'],
        ]);

        $resumePath = $request->file('resume')->store('job-applications/resumes', 'public');

        $application = JobApplication::create([
            'first_name' => $validated['firstName'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'position' => $validated['position'],
            'portfolio' => $validated['portfolio'] ?? null,
            'message' => $validated['message'] ?? null,
            'job_slug' => $validated['jobSlug'] ?? null,
            'job_title' => $validated['jobTitle'] ?? null,
            'resume_path' => $resumePath,
            'status' => 'new',
        ]);

        $resumeAbsolutePath = Storage::disk('public')->path($resumePath);
        $internalRecipient = config('mail.job_applications_to', 'info@aibuzz.net');

        Mail::send('mail-templates.job-application-admin', [
            'application' => $application,
        ], function ($message) use ($application, $internalRecipient, $resumeAbsolutePath) {
            $message->to($internalRecipient)
                ->replyTo($application->email, $application->first_name)
                ->subject('New job application: ' . $application->position)
                ->attach($resumeAbsolutePath, [
                    'as' => 'resume-' . $application->id . '.pdf',
                    'mime' => 'application/pdf',
                ]);
        });

        Mail::send('mail-templates.job-application-confirmation', [
            'application' => $application,
        ], function ($message) use ($application) {
            $message->to($application->email, $application->first_name)
                ->subject('We received your application | Pocket Office');
        });

        return response()->json([
            'status' => true,
            'message' => 'Application submitted successfully',
        ]);
    }
}

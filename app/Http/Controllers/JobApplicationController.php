<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'position' => ['required', 'string', 'max:255'],
            'portfolio' => ['nullable', 'string', 'max:2048'],
            'message' => ['nullable', 'string', 'max:5000'],
            'jobSlug' => ['nullable', 'string', 'max:255'],
            'jobTitle' => ['nullable', 'string', 'max:255'],
            'resume' => ['required', 'file', 'mimes:pdf', 'max:2048'],
        ]);

        $resumePath = $request->file('resume')->store('job-applications/resumes', 'public');

        JobApplication::create([
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

        return response()->json([
            'status' => true,
            'message' => 'Application submitted successfully',
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class CareerController extends Controller
{
    // Render the single job detail page layout view
    public function jobDetail($slug)
    {
        return view('pages.job-details', ['slug' => $slug]);
    }

    // Fetch all open positions from your CMS
    public function fetchJobs()
    {
        try {
            // Replace 'jobs' with 'careers' if that's your custom post type endpoint name
            $response = Http::timeout(15)->get(
                'https://pocketoffice-cms.aibuzz.net/wp-json/wp/v2/careers',
                [
                    '_embed' => true,
                ]
            );

            if (!$response->successful()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Unable to fetch open positions',
                    'data' => [],
                ], 500);
            }

            return response()->json([
                'status' => true,
                'data' => $response->json(),
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $e->getMessage(),
                'data' => [],
                ], 500);
        }
    }

    // Fetch details of a single job opening via its slug
    public function fetchJobDetail($slug)
    {
        try {
            // Replace 'jobs' with 'careers' if that's your custom post type endpoint name
            $response = Http::timeout(15)->get(
                'https://pocketoffice-cms.aibuzz.net/wp-json/wp/v2/careers',
                [
                    'slug' => $slug,
                    '_embed' => true,
                ]
            );

            if (!$response->successful()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Unable to fetch position detail',
                    'data' => null,
                ], 500);
            }

            $jobs = $response->json();

            if (empty($jobs)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Job opening not found',
                    'data' => null,
                ], 404);
            }

            // Return the first matching record array item
            return response()->json([
                'status' => true,
                'data' => $jobs[0],
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $e->getMessage(),
                'data' => null,
            ], 500);
        }
    }
}
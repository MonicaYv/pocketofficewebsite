<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class BlogController extends Controller
{

    // BlogDetail function to render blog detail page
    public function BlogDetail($slug)
    {
        return view('pages.blog-details', ['slug' => $slug]);
    }
    public function fetchBlogs()
    {
        try {
            $response = Http::timeout(15)->get(
                'https://pocketoffice-cms.aibuzz.net/wp-json/wp/v2/posts',
                [
                    '_embed' => true,
                ]
            );

            if (!$response->successful()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Unable to fetch blogs',
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
public function fetchBlogDetail($slug)
{
    try {
        $response = Http::timeout(15)->get(
            'https://pocketoffice-cms.aibuzz.net/wp-json/wp/v2/posts',
            [
                'slug' => $slug,
                '_embed' => true,
            ]
        );

        if (!$response->successful()) {
            return response()->json([
                'status' => false,
                'message' => 'Unable to fetch blog detail',
                'data' => null,
            ], 500);
        }

        $posts = $response->json();

        if (empty($posts)) {
            return response()->json([
                'status' => false,
                'message' => 'Blog not found',
                'data' => null,
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $posts[0],
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
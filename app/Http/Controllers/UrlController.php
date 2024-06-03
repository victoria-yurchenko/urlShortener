<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Models\Url;

class UrlController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'original_url' => 'required|url'
            ]);

            // Check if the URL already exists
            $existingUrl = Url::where('original_url', $request->original_url)->first();
            if ($existingUrl) {
                return response()->json($existingUrl);
            }

            // Generate a unique short URL
            $folder = 'something'; // You can generate or specify any folder name here
            do {
                $shortUrl = Str::random(6);
                $fullShortUrl = $folder . '/' . $shortUrl;
            } while (Url::where('short_url', $fullShortUrl)->exists());

            $url = Url::create([
                'original_url' => $request->original_url,
                'short_url' => $fullShortUrl
            ]);

            return response()->json($url);
        } catch (\Exception $e) {
            Log::error('Error storing URL: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while storing the URL.'], 500);
        }
    }

    public function show($any, $shortUrl)
    {
        try {
            $fullShortUrl = $any . '/' . $shortUrl;
            $url = Url::where('short_url', $fullShortUrl)->firstOrFail();
            return redirect($url->original_url);
        } catch (\Exception $e) {
            Log::error('Error showing URL: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while redirecting the URL.'], 500);
        }
    }
}

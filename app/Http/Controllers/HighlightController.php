<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use App\Services\FootballApiService;

class HighlightController extends Controller
{
    protected $footballApi;

    public function __construct(FootballApiService $footballApi)
    {
        $this->footballApi = $footballApi;
    }

    public function index()
    {
        // ✅ Fetch the most recent 10 finished matches
        $matches = $this->footballApi->getHistoryMatches(10);

        Log::info('Fetched Recent Matches:', ['matches' => $matches]);

        if (empty($matches)) {
            Log::warning('No recent matches found in Football API.');
        }

        // Directly use your YouTube API key here
        $apiKey = 'AIzaSyCbRekpkk3xvnLNFNdB7FY4_fA5FbiZpEI'; // Replace with your actual YouTube API key

        $highlights = [];

        foreach ($matches as $match) {
            $home = $match['teams']['home']['name'] ?? 'Unknown Home';
            $away = $match['teams']['away']['name'] ?? 'Unknown Away';
            $date = isset($match['fixture']['date']) ? date('Y', strtotime($match['fixture']['date'])) : 'Unknown Date';
            $query = "$home vs $away $date highlights";

            // Generate a unique cache key for each match's YouTube search query
            $cacheKey = 'yt_highlight_' . md5($query);

            $video = Cache::remember($cacheKey, now()->addHours(12), function () use ($query, $apiKey) {
                $youtubeUrl = "https://www.googleapis.com/youtube/v3/search?part=snippet&q=" . urlencode($query) . "&key=$apiKey&maxResults=1&type=video";
                $response = Http::get($youtubeUrl);

                Log::info("YouTube API response for query: $query", ['response' => $response->json()]);

                if ($response->failed()) {
                    Log::error("YouTube API failed for query: $query", []);
                    return null;
                }

                return $response->json()['items'][0] ?? null;
            });

            if ($video) {
                $highlights[] = [
                    'title' => $video['snippet']['title'],
                    'thumbnail' => $video['snippet']['thumbnails']['high']['url'],
                    'videoId' => $video['id']['videoId'],
                    'match' => "$home vs $away",
                ];
            } else {
                Log::warning("No highlight found for: $home vs $away", []);
            }
        }

        if (empty($highlights)) {
            Log::warning("No highlights found for recent matches.", []);
        }

        return view('highlights.index', compact('highlights'));
    }
}

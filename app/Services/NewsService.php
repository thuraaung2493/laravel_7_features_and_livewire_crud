<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class NewsService
{
    public function headlines(): Collection
    {
        $response = Http::get(config('news.top_headlines_url'));

        if ($response->serverError() || $response->clientError()) {
            // dd($response->json());
            // Error Log
            return collect([]);
        }

        $collection = collect($response->json()['articles'])->map(function ($article) {
            return [
                'author' => $article['author'],
                'title' => $article['title'],
                'description' => $article['description'],
                'url' => $article['url'],
                'imageUrl' => $article['urlToImage'],
                'publishedAt' => $article['publishedAt'] !== null
                    ? Carbon::createFromFormat('Y-m-d\TH:i:s\Z', $article['publishedAt'])
                    : 'unknown',
            ];
        });

        return $collection;
    }
}

<?php

namespace App\Repository;

use App\Interface\QuotsInterface;
use Illuminate\Support\Facades\Http;

class QuotsRepo implements QuotsInterface {
    public function getQuots() {
        $respons = Http::withHeaders([
            'X-Api-key' => 'ZGE5rl6NAQOUEfQN83NobQ==eDoOZdIx41ykgLZC',
        ])->get('https://api.api-ninjas.com/v1/quotes');

        if ($respons->successful()) {
            return $respons->json();
        } else {
            return null;
        }
        
    }

    public function getQuotsByCategory($category) {
        $respons = Http::withHeaders([
            'X-Api-key' => 'ZGE5rl6NAQOUEfQN83NobQ==eDoOZdIx41ykgLZC'
        ])->get('https://api.api-ninjas.com/v1/quotes?category=' . $category);

        if ($respons->successful()) {
            return $respons->json();
        } else {
            return null;
        }
        
    }
}
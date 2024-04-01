<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Models\Ranking;

class FetchRankings extends Command
{
    protected $signature = 'fetch:rankings';
    protected $description = 'Fetch rankings from external API and store them in the database';

    public function handle()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://muro.sakenowa.com/sakenowa-data/api/rankings');
        $rankings = json_decode($response->getBody()->getContents(), true);

        foreach ($rankings['overall'] as $ranking) {
            Ranking::updateOrCreate(
                ['brand_id' => $ranking['brandId']],
                ['rank' => $ranking['rank'], 'score' => $ranking['score']]
            );
        }

        $this->info('Rankings have been fetched and stored successfully.');
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Models\FlavorTag;

class FetchFlavorTags extends Command
{
    protected $signature = 'fetch:flavorTags';
    protected $description = 'Fetch flavor tags from external API and store them in the database';

    public function handle()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://muro.sakenowa.com/sakenowa-data/api/brand-flavor-tags');
        $flavorTags = json_decode($response->getBody()->getContents(), true);

        foreach ($flavorTags['flavorTags'] as $flavorTag) {
            FlavorTag::create([
                'brandId' => $flavorTag['brandId'],
                'tagIds' => json_encode($flavorTag['tagIds']), // tagIdsをJSON文字列として保存
            ]);
        }

        $this->info('Flavor tags have been fetched and stored successfully.');
    }
}
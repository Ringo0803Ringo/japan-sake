<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Models\FlavorTag;

class FetchFlavorTags extends Command
{
    protected $signature = 'fetch:flavor-tags';
    protected $description = 'Fetch flavor tags from external API and store them in the database';

    public function handle()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://muro.sakenowa.com/sakenowa-data/api/brand-flavor-tags');
        $flavorTags = json_decode($response->getBody()->getContents(), true);

        foreach ($flavorTags['flavorTags'] as $flavorTag) {
            FlavorTag::updateOrCreate(
                ['brand_id' => $flavorTag['brandId']],
                ['tag_id' => implode(',', $flavorTag['tagIds'])] // tag_idをカンマ区切りの文字列として保存
            );
        }

        $this->info('Flavor tags have been fetched and stored successfully.');
    }
}
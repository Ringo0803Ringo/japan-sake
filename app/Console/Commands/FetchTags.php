<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Models\Tag;

class FetchTags extends Command
{
    protected $signature = 'fetch:tags';
    protected $description = 'Fetch tags from external API and store them in the database';

    public function handle()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://muro.sakenowa.com/sakenowa-data/api/flavor-tags');
        $tags = json_decode($response->getBody()->getContents(), true);

        foreach ($tags['tags'] as $tag) {
            Tag::updateOrCreate(['id' => $tag['id']], ['tag' => $tag['tag']]);
        }

        $this->info('Tags have been fetched and stored successfully.');
    }
}
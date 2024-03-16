<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Models\Area;

class FetchAreas extends Command
{
    protected $signature = 'fetch:areas';
    protected $description = 'Fetch areas from external API and store them in the database';

    public function handle()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://muro.sakenowa.com/sakenowa-data/api/areas');
        $areas = json_decode($response->getBody()->getContents(), true);

        foreach ($areas['areas'] as $area) {
            Area::updateOrCreate(['id' => $area['id']], ['name' => $area['name']]);
        }

        $this->info('Areas have been fetched and stored successfully.');
    }
}

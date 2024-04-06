<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Models\Brewery;

class FetchBreweries extends Command
{
    protected $signature = 'fetch:breweries';
    protected $description = 'Fetch breweries from external API and store them in the database';

    public function handle()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://muro.sakenowa.com/sakenowa-data/api/breweries');
        $breweries = json_decode($response->getBody()->getContents(), true);

        foreach ($breweries['breweries'] as $brewery) {
            Brewery::updateOrCreate(['id' => $brewery['id']], ['name' => $brewery['name'], 'area_id' => $brewery['areaId']]);
        }

        $this->info('Breweries have been fetched and stored successfully.');
    }
}

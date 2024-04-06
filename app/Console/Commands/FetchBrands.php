<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Models\Brand;

class FetchBrands extends Command
{
    protected $signature = 'fetch:brands';
    protected $description = 'Fetch brands from external API and store them in the database';

    public function handle()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://muro.sakenowa.com/sakenowa-data/api/brands');
        $brands = json_decode($response->getBody()->getContents(), true);

        foreach ($brands['brands'] as $brand) {
            Brand::updateOrCreate(['id' => $brand['id']], ['name' => $brand['name'], 'brewery_id' => $brand['breweryId']]);
        }

        $this->info('Brands have been fetched and stored successfully.');
    }
}
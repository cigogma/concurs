<?php


namespace App\Modules\Kindom\Generator;

use GuzzleHttp\Client;

class NameGenerator
{
    private $fakeNameEndpoint = 'https://api.namefake.com/';
    private Client $client;
    public function __construct()
    {
        $this->client = new Client();
    }

    public function generateName(): string
    {
        $response = $this->client->request('GET', $this->fakeNameEndpoint);

        $content = json_decode($response->getBody());
        return $content->name;
    }
}

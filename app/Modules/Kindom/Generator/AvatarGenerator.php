<?php


namespace App\Modules\Kindom\Generator;

use GuzzleHttp\Client;

class AvatarGenerator
{
    private $endpoint = 'https://avatars.dicebear.com/api/';

    public function __construct()
    {
        $this->client = new Client();
    }

    public function generate(string $seed): string
    {
        return $this->endpoint . "male/$seed.svg";;
    }
}

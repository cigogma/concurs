<?php


namespace App\Modules\Kindom\Generator;

use App\Modules\Kindom\Data\KnightData;
use GuzzleHttp\Client;
use Illuminate\Support\Str;

class KnightGenerator
{
    public function makeKnight()
    {
        $knight = [];
        $knight['name'] = (new NameGenerator)->generateName();
        $knight['age'] = rand(20, 25);
        $knight['picture'] = (new AvatarGenerator)->generate(Str::slug($knight['name']));
        $knight['virtues'] = (new VirtuesGenerator)->generate($knight['age']);

        return KnightData::fromArray($knight);
    }
}

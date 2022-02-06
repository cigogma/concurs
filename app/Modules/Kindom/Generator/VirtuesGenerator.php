<?php


namespace App\Modules\Kindom\Generator;

use App\Modules\Kindom\Types\VirtueType;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;

class VirtuesGenerator
{

    public function __construct()
    {
    }

    public function generate(string $seed): Collection
    {
        return collect(VirtueType::getValues())->map(function ($name) use ($seed) {
            $methodName = "generate_$name";
            return [
                'name' => $name,
                'value' => method_exists($this, $methodName) ? $this->{$methodName}($seed) : rand(0, 100)
            ];
        });
    }

    private function generate_courage($seed)
    {
        $ageBasedValue = ($seed - 20) / 5 * 100;
        return rand(0, 10) * $ageBasedValue;
    }

    private function generate_faith($seed)
    {
        $ageBasedValue = ($seed - 20) / 5 * 100;
        return rand(0, 10) * $ageBasedValue;
    }

    private function generate_justice($seed)
    {
        $ageBasedValue = ($seed - 20) / 5 * 100;
        return rand(0, 10) * $ageBasedValue;
    }

    private function generate_strenght($seed)
    {
        $ageBasedValue = ($seed - 20) / 5 * 100;
        return rand(0, 10) * $ageBasedValue;
    }

    private function generate_defense($seed)
    {
        $ageBasedValue = ($seed - 20) / 5 * 100;
        return rand(0, 10) * $ageBasedValue;
    }

    private function generate_battle_strategy($seed)
    {
        return rand(0, 100);
    }
}

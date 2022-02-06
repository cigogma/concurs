<?php


namespace App\Modules\Kindom\Data;

use App\Modules\Kindom\Contracts\Knight;
use Illuminate\Support\Collection;

class KnightData implements Knight
{
    public function __construct(
        public string $name,
        public int $age,
        public string $picture,
        public Collection $virtues,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getPicture(): string
    {
        return $this->picture;
    }

    public function getVirtue(string $name): int
    {
        return $this->virtues->where('name', $name)->first();
    }

    public function getVirtues(): array
    {
        return $this->virtues->toArray();
    }
    public static function fromArray($arr)
    {
        return new self(
            $arr['name'],
            $arr['age'],
            $arr['picture'],
            $arr['virtues'],
        );
    }
}

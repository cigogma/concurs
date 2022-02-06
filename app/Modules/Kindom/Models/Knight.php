<?php

namespace App\Modules\Kindom\Models;

use App\Modules\Kindom\Contracts\Knight as IKnight;
use Illuminate\Database\Eloquent\Model;

class Knight extends Model implements IKnight
{
    protected $fillable = [
        'name',
        'age',
        'picture'
    ];
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
        return $this->virtues()->where('name', $name)->first()?->value ?? 0;
    }

    public function getVirtues(): array
    {
        return $this->virtues;
    }

    public function virtues()
    {
        return $this->hasMany(Virtue::class);
    }

    public static function fromData(IKnight $data)
    {
        $knight =  self::create([
            'name' => $data->getName(),
            'age' => $data->getAge(),
            'picture' => $data->getPicture(),
        ]);
        collect($data->getVirtues())->each(function ($data) use ($knight) {
            $knight->virtues()->create([
                'name' => $data['name'],
                'value' => $data['value']
            ]);
        });
        return $knight;
    }
}

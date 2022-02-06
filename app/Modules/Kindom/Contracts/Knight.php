<?php

namespace App\Modules\Kindom\Contracts;

interface Knight
{
    public function getName(): string;

    public function getAge(): int;

    public function getPicture(): string;

    public function getVirtue(string $name): int;

    public function getVirtues(): array;
}

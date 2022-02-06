<?php

namespace App\Modules\Competition\Contracts;

interface Stage
{
    public function setParticipants($participants): self;

    public function getWinners(): array;
}

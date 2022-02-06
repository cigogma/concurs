<?php

namespace App\Modules\Competition\Stages;

class Battle extends CompetitionStage
{
    public function getWinners(): array
    {
        return [$this->participants[0]];
    }
}

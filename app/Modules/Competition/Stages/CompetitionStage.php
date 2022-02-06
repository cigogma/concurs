<?php

namespace App\Modules\Competition\Stages;

use App\Modules\Competition\Contracts\Stage;

class CompetitionStage implements Stage
{

    protected $participants;
    public function getWinners(): array
    {
        return $this->participants;
    }

    public function setParticipants($participants): Stage
    {
        $this->participants = $participants;
        return $this;
    }
}

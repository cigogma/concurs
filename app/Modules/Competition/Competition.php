<?php

namespace App\Modules\Competition;

use App\Modules\Competition\Contracts\Stage;

class Competition
{
    /**
     * @var Stage[]
     */
    protected array $stages;

    protected array $winners;

    protected array $participants;

    public function setParticipants(array $participants)
    {
        $this->participants = $participants;
        return $this;
    }

    public function addStage(Stage $stage): self
    {
        $this->stages[] = $stage;
        return $this;
    }
    public function getWinners()
    {
        return $this->winners;
    }
    public function run()
    {
        $participants = $this->participants;
        foreach ($this->stages as $stage) {
            $participants = $stage->setParticipants($participants)->getWinners();
        }
        $this->winners = $participants;
        return $this;
    }
}

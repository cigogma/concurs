<?php

namespace Tests\Feature;

use App\Modules\Competition\Competition;
use App\Modules\Competition\Stages\Battle;
use App\Modules\Competition\Stages\Preselection;
use App\Modules\Competition\Stages\Selection;
use App\Modules\Kindom\Generator\KnightGenerator;
use App\Modules\Kindom\Models\Knight;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompetitionTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_knight_generation()
    {
        $generator = new KnightGenerator();
        $knight = $generator->makeKnight();
        $this->assertTrue(gettype($knight) === 'object');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_save_knight()
    {
        $generator = new KnightGenerator();
        $knight = Knight::fromData($generator->makeKnight());
        $this->assertTrue(!!Knight::find($knight->id));
    }
    public function generateParticipants()
    {
        $participants = [];
        $generator = new KnightGenerator();
        for ($i = 0; $i < 10; $i++) {
            $participants[] = $generator->makeKnight();
        }
        return $participants;
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_competition()
    {

        $participants = $this->generateParticipants();
        $this->assertTrue(count($participants) === 10);
        $competition = (new Competition())->addStage(new Preselection)->addStage(new Selection)->addStage(new Battle);
        $winners = $competition->setParticipants($participants)->run()->getWinners();
        $this->assertTrue(count($winners) === 1);
    }
}

<?php

namespace Tests\Feature\Factory;

use App\Models\Colony;
use Database\Factories\AntFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AntFactoryTest extends TestCase
{
    public function test_generate_valid_ant_with_uuid_and_colony_id()
    {
        $ant = AntFactory::new()->create();

        $this->assertNotNull($ant->uuid);
        $this->assertNotNull($ant->colony_id);
    }

    public function test_generate_multiple_ants_with_unique_uuids_and_colony_ids()
    {
        $ants = AntFactory::new()->count(5)->create();

        $uuids = $ants->pluck('uuid')->unique();

        $this->assertCount(5, $ants);
        $this->assertCount(5, $uuids);
    }

    public function test_generate_ant_with_existing_colony_id()
    {
        $colony = Colony::factory()->create();

        $ant = AntFactory::new()->create(['colony_id' => $colony->id]);

        $this->assertEquals($colony->id, $ant->colony_id);
    }

    public function test_fail_to_generate_ant_when_colony_id_generation_fails()
    {
        $this->expectException(\Exception::class);

        AntFactory::new()->create(['colony_id' => null]);
    }
}

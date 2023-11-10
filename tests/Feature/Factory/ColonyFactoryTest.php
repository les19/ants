<?php

namespace Tests\Feature\Factory;

use Database\Factories\ColonyFactory;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ColonyFactoryTest extends TestCase
{
    public function test_create_colony_with_name()
    {
        $colony = ColonyFactory::new()->create();

        $this->assertNotEmpty($colony->name);
    }

    public function test_create_multiple_colonies_with_unique_names()
    {
        $colony1 = ColonyFactory::new()->create();
        $colony2 = ColonyFactory::new()->create();

        $this->assertNotEquals($colony1->name, $colony2->name);
    }

    public function test_throw_exception_if_name_not_provided()
    {
        $this->expectException(QueryException::class);

        ColonyFactory::new()->create([
            'name' => null,
        ]);
    }
}

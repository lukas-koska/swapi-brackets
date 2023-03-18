<?php

namespace Tests\Unit;

use App\Models\Planet;
use PHPUnit\Framework\TestCase;

class PlanetTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $planet = new Planet(
            [
                'name' => 'Test',
                'diameter' => '1043453',
            ]
        );
        $this->assertStringContainsString('Test', $planet['name']);
        $this->assertStringContainsString('1043453', $planet['diameter']);
    }
}

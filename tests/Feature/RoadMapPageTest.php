<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoadmapPageTest extends TestCase
{
    /**
     * Make sure the Roadmap page loads ok
     *
     * @test
     * @return void
     */
    public function ensure_roadmap_page_loads_ok()
    {
        $response = $this->get('/roadmap');

        $response->assertStatus(200);
    }
}

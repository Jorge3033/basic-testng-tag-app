<?php

namespace Tests\Feature;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_the_text_should_be_show_empty_tags()
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertSee('No tags yet');
    }
    public function test_the_text_should_be_show_tags()
    {
        $tag = Tag::factory()->create();
        $this->get('/')
            ->assertStatus(200)
            ->assertSee($tag->name)
            ->assertDontSee('No tags yet');
    }
}

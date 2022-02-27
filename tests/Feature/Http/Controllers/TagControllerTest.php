<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_method_store_should_be_insert_records_from_database()
    {
        $this->post('/tag', [
            'name' => 'Tag 1'
        ])
        ->assertRedirect('/');

        $this->assertDatabaseHas('tags',[
            'name' => 'Tag 1'
        ]);
    }

    public function test_the_method_delete_should_be_delete_records_from_database()
    {
        $tag = Tag::factory()->create();

        $this->delete('/tag/' . $tag->id)
        ->assertRedirect('/');

        $this->assertDatabaseMissing('tags',[
            'name' => $tag->name
        ]);
    }

    public function test_the_attribute_name_should_be_required()
    {
        $this->post('/tag', [
            'name' => ''
        ])
        ->assertSessionHasErrors('name');
    }

}

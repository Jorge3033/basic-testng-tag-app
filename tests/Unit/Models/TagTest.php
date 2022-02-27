<?php

namespace Tests\Unit\Models;

use App\Models\Tag;
use PHPUnit\Framework\TestCase;

class TagTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_the_attribute_name_should_be_a_slug()
    {
        $tag = new Tag();
        $tag->name = 'Tag 1';
        $this->assertEquals('tag-1', $tag->slug_name);
    }
}

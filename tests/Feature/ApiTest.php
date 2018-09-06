<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase as RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class ApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testIndex()
    {

        $response = $this->json('get', 'api/comment');
        $response->assertStatus(200);

    }

    public function testCommentGet()
    {
        $this->seed('DatabaseSeeder');

        $response = $this->json('get', 'api/comment/1');
        $response->assertStatus(200);

    }

    public function testCommentCreatedCorrect()
    {
        $test = [
            'name' => 'Alex',
            'email' => 'test@mail.net',
            'text' => 'Text Comment',
            'parent_id' => '1'
        ];

        $response = $this->json('POST', 'api/comment', $test);
        $response->assertJson([
            'name' => 'Alex',
            'email' => 'test@mail.net',
            'text' => 'Text Comment',
            'parent_id' => 1
        ]);

    }

    public function testCommentUpdatedCorrect()
    {
        $this->seed('DatabaseSeeder');
        $test = [
            'name' => 'Alex',

        ];

        $response = $this->json('PUT', 'api/comment/1', $test);
        $response->assertJson([
            'name' => 'Alex',
        ]);

    }

    public function testCommentDeleted()
    {
        $comment = factory(\App\Comment::class)->create([
            'name' => 'Alex',
            'email' => 'test@mail.net',
            'text' => 'Text Comment',
            'parent_id' => 0,
        ]);


        $response = $this->json('DELETE', 'api/comment/' . $comment->id);
        $response->assertStatus(204);

    }
}

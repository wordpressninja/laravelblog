<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewPostTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function ViewUsersPostTest()
    {
        $user = factory(User::class)->create([
            'user' =>   'JohnDoe'
        ]);
        $posts = factory(Post::class)->create([
            'title' => 'View Post Test'
        ]);
        $user->$post()-save($post);
        $response = $this->get('/admin/posts')->see('View Post Test');




        $response->assertStatus(200);
    }
}

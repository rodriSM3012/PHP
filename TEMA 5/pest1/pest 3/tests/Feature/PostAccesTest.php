<?php

use App\Models\Post;
use App\Models\User;

it('Wellcome can be accessed', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('Posts index page can be accessed', function () {
    $response = $this->get(route('posts.index'));

    $response->assertStatus(200);
    $response->assertSee('Todos los posts');
});

test('Posts index page with h1 can be accessed', function () {
    $response = $this->get(route('posts.index'));

    $response->assertStatus(200);
    $response->assertSeeInOrder(['<h1>', 'Todos los posts', '</h1>'], false);
});

test('Verify that the Post class exists and is accessible', function () {
    $classExists = class_exists('App\Models\Post');
    expect($classExists)->toBeTrue();
});

test('Verify that the Post controller exists and is accessible', function () {
    $classExists = class_exists('App\Http\Controllers\PostController');
    expect($classExists)->toBeTrue();
});

test('Verify index list all posts in order by date descending', function () {
    $user= User::factory()->create();
    $post1 = Post::factory()->create([
        'created_at' => now()->subDay()
    ]);
        $post2 = Post::factory()->create([
        'created_at' => now()
    ]);

    $response = $this->get(route('posts.index'));
    
    $response->assertStatus(200)
             ->assertSee($post1->title)
             ->assertSee($post2->title)
             ->assertSeeInOrder([$post2->title, $post1->title]);
});

test('post show author, title, content and date', function () {
    $user= User::factory()->create(["name" => "Manolo"]);
    $post1 = Post::factory()->for($user)->create([
        'title' => 'Post 1',
        'content' => 'Content of post 1',
        'created_at' => now()->subDay()
    ]);
    // $post1 = Post::factory()->create([
    //     'title' => 'Post 1',
    //     'content' => 'Content of post 1',
    //     'created_at' => now()->subDay(),
    //     'user_id' => $user->id
    // ]);

    $response = $this->get(route('posts.index'));
    
    $response->assertStatus(200)
             ->assertSee("Post 1")
             ->assertSee("Content of post 1")
             ->assertSee("Manolo")
             ->assertSee(now()->subDay()->format('d/m/Y'));
});

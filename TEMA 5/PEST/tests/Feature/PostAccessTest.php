<?php

test('Posts index page can be accessed', function () {
    // $response = $this->get('/');
    $response = $this->get(route('posts.index'));

    $response->assertStatus(200);
    $response->assertSee(['<h1>', 'Todos los posts', '</h1>'], false);
});

test('Verify index list all posts in order by date descending', function () {
    $user = User::factory()->create();
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
    $user = User::factory()->create(["name" => "Manolo"]);
    $post1 = Post::factory()->for($user)->create([
        'created_at' => now()->subDay()
    ]);
    $post2 = Post::factory()->create([
        'created_at' => now()
    ]);

    $response = $this->get(route('posts.index'));

    $response->assertStatus(200)
        ->assertSee("Post 1")
        ->assertSee("Contents of post 1")
        ->assertSee("Manolo")
        ->assertSee(now()->subDay()->format('d/m/Y'));
});

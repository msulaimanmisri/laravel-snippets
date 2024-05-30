<?php
declare(strict_types=1);

/**
 * There's 2 way to make our Many-to-Many relationship easy to implement, easy to read
 * First, we use `constrain` method
 */
Schema::create('post_tag', function(Blueprint $table) {
    $table->foreignId('post_id')
    ->constrained('posts');
});

/**
 * Second, we can use `foreignIdFor` method
 */
Schema::create('post_tag', function(Blueprint $table) {
    $table->foreignIdFor(Post::class, 'post_id');
});

<?php
declare(strict_types=1);

/**
 * There are 2 ways to make our Many-to-Many relationship easy to implement, easy to read
 * First, we use `constrained` method
 */
Schema::create('post_tag', function(Blueprint $table) {
    $table->foreignId('post_id')
    ->constrained('posts')
    ->cascadeOnDelete();
});

/**
 * Second, we can use the `foreignIdFor` method
 */
Schema::create('post_tag', function(Blueprint $table) {
    $table->foreignIdFor(Post::class, 'post_id')
    ->constrained()
    ->cascadeOnDelete();
});

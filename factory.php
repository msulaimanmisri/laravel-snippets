<?php

class User extends Factory {
    public function definition () : array {
        return [
            'name' => fake()->name()
        ];
    }
}

class someFactoryClass extends Factory {
    public function definition () : array {
        return [
            'author_id' => User::factory(), // this will assign automatic user ID
            'title' => fake()->title(),
            'body_content' => fake()->sentence()
        ];
    }
}

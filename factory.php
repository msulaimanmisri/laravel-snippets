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

/**
 * DatabaseSeeder
 */
public function run() : void {
    User::factory()
    ->has(SomeFactoryClass::factory(3))
    ->create(['name']);
} 

/**
 * If you want to create Fake data, but don't want to insert it into the DB,
 * you can use `make()`
 */
User::factory()->make();


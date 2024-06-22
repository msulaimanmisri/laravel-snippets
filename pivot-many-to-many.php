<?php

// Model
class Job {
    public function tags() : BelongsToMany {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function tag(string $tagName) : void {
        $tag = Tag::firstOrCreate(['name' => $tagName]);
        $this->tags()->attach($tag);
    }
}

// Controller
class JobController {
    public function store() {
        auth()->user()->jobs()->tag('some-data');
    }
}

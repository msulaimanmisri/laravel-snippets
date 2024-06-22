<?php

class someSeeder extends Seeder {

  public function run() : void {

    // Bayangkan kita nak run Many-to-many seeder

    $tags = Tag::factory(10)->create();

    // hasAttached method ini spesicially untuk M-T-M relationship
    Job::factory(100)->hasAttached($tags)->create();
  }

}

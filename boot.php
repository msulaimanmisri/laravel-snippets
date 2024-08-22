<?php
declare(strict_types=1);

class AppServiceProvider {

  public function boot() : void {

    User::shouldBeStrict();
     Model::preventAccessingMissingAttributes();

  }

}

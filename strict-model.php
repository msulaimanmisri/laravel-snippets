<?php

class AppServiceProvider {

  public function boot() : void {

    User::shouldBeStrict();

  }

}

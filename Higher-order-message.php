<?php

/**
 * Controller
 * Higher Order Logic
 */
class UserController extends Controller {
    public function setUserAsActive() : void
    {
        $users = User::whereStatus('inactive')->get();
        $users->each->markAsActive();
    }
}

/**
 * Model
 * Because HOL only can call a method
 * So any HOL that available in Laravel can get any method inside the method
 */
class User extends Model {
    public function markAsActive() {
        // Active logic runs here
    }
}

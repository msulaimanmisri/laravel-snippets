<?php
declare(strict_types=1);

class SomeController {
    public function edit(someClass $someClass) {

        /**
         * Check if the user is logged in or not
         */
        if ( Auth::guest() ) {
            return "Bro, you need to login first";
        }

         /**
         * Another way to check if the Posts is belongs to the Authenticated user
         */
        $notTheUser = $someClass->firstData->secondData->isNot(Auth::user());
        abort_if($notTheUser, message: "This is not your Post!");

        /**
         * You also may need to use Laravel Gates @ Policy to make your Code more robust
         * 
         * @link https://laravel.com/docs/11.x/authorization#gates
         * @link https://laravel.com/docs/11.x/authorization#creating-policies
         */
    }
}

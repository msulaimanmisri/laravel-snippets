<?php
declare(strict_types=1);

// Reminder : Authorization is used only for certain method / function. Not all need Authorization 

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
        $notTheUser = $someClass->firstData->secondData->isNot( Auth::user() );
        abort_if( $notTheUser, message: "This is not your Post!" );

        /**
         * Laravel `can` and `cannot`
         * @link https://laravel.com/docs/11.x/authorization#via-blade-templates
         */
        if ( Auth::login()->cannot('edit-some-class', $someClass) ) {
            abort(403, 'Unauthorized');
        }

        /**
         * You also may need to use Laravel Gates @ Policy to make your code more robust
         * @link https://laravel.com/docs/11.x/authorization#gates
         * @link https://laravel.com/docs/11.x/authorization#creating-policies
         * 
         * Untuk lagi robust, gunakan Middleware then combine dengan @can / @cannot
         * @link https://laravel.com/docs/11.x/middleware
         */
    }
}

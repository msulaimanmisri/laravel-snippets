<?php

/**
 * This code will help us to do the delete and update process
 * instead of using Controller
 */

class Model {
    protected $casts = [
        'images' => 'json'
    ];

    protected static function booted() : void {
        // Delete the image
        static::deleted(function(AnotherModel $anotherModel) {
            foreach($anotherModel->images as $image) {
                Storage::delete("public/$image");
            }
        });

        // Update the image
        static::updating(function(AnotherModel $anotherModel) {
            $images = array_diff($anotherModel->getOriginal('images'), $anotherModel->images);
            foreach($images as $image) {
                Storage::delete("public/$image");
            }
        }); 
    }
}

<?php

class SomeRequest extends FormRequest {
  
    public function rules() {
        return [
            'title' => ['required', 'string'],
            'body' => ['required', 'string']
        ];
    }

    /**
     * If we wanted to do some action for the rules and before it's arrived at our business logic,
     * we can use this `prepareForValidation` method.
     * 
     * Let's see the use case. We need to make all the value given as lower-case. So that later
     * in DB, all data coming from the user will become lower-case
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'title' => strtolower($this->title),
            'slug' => Str::slug($this->title),
            'body' => strtolower($this->body),
        ]);
    }


}

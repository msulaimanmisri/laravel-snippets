<?php
declare(strict_types=1);

// Parent Class

class PasswordChaining {
    protected $min = 8;
    protected $max;
    protected $letters;

    public function min(int $value) {
        return new static($value);
    }

    public function max(int $value) {
        $this->max = $value;
        return $this;
    }

    public function letters($value) {
        $this->letters = $value;
        return $this;
    }
}

// Children Class

class OtherClass implements PasswordChaining {
    public function storeThePassword() {
        $attributes = request()->validate([
            'password' => [
                'required', 
                Password::min(10)
                ->max(100)
                ->letters()
                ]
        ]);
    }
}

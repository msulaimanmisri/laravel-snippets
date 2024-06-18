<?php
declare(strict_types=1);

// Class
class SessionController {
    /**
     * Login Method
     */
    public function login() {
        $attributes = request()->validate(request()->all());
        
        if(! Auth::attempt($attributes)) {
            throw ValidationException::withMessages(); // Array of messages
        }

        request()->session()->regenerate();
        return to_route('page.dashboard');
    }

    /**
     * Logout Method
     */
    public function logout() {
        Auth::logout();
        return to_route('page.login');
    }
}

// Routes
Route::post('/login', [SessionController::class, 'login']);
Route::post('/logout', [SessionController::class, 'logout']);

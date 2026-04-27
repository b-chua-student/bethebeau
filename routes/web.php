<?php

use Illuminate\Support\Facades\Route;

Route::fallback(fn () => redirect()->route('auth.login'));
});

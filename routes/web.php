<?php

use Src\Route;

Route::add('GET', '/home', [Controller\Site::class, 'home'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add('GET', '/staffs', [Controller\Site::class, 'staffs']);
Route::add('GET', '/items', [Controller\Site::class, 'items']);

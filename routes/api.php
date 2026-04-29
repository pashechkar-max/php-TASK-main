<?php

use Src\Route;

Route::add('POST', '/api/login', [Controller\Api::class, 'login']);
Route::add('GET', '/api/items', [Controller\Api::class, 'items'])->middleware('apiAuth');
Route::add('GET', '/api/me', [Controller\Api::class, 'me'])->middleware('apiAuth');
Route::add('POST', '/api/echo', [Controller\Api::class, 'echo']);

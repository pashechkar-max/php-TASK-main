<?php

use Src\Route;

Route::add('GET', '/profile', [Controller\Site::class, 'profile'])->middleware('auth');
Route::add(['GET', 'POST'], '/profile/edit', [Controller\Site::class, 'profile_edit'])->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add('GET', '/staffs', [Controller\Site::class, 'staffs']);
Route::add(['GET', 'POST'], '/user/add', [Controller\Site::class, 'user_add']);
Route::add('GET', '/items', [Controller\Site::class, 'items']);
Route::add(['GET', 'POST'], '/item/add', [Controller\Site::class, 'item_add']);
Route::add('GET', '/supplies', [Controller\Site::class, 'supplies']);
Route::add('GET', '/issues', [Controller\Site::class, 'issues']);
Route::add('GET', '/departments', [Controller\Site::class, 'departments']);
Route::add('GET', '/user/delete', [Controller\Site::class, 'user_delete']);



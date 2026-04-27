<?php
return [
    //Класс аутентификации
    'auth' => \Src\Auth\Auth::class,
    //Клас пользователя
    'identity' => \Model\User::class,
    //Классы для middleware
    'routeMiddleware' => [
        'auth' => Middlewares\AuthMiddleware::class,
    ],
    'validators' => [
        'required' => \Validators\RequireValidator::class,
        'unique' => \Validators\UniqueValidator::class,
        'kiril' => \Validators\KirilValidator::class,
        'email' => \Validators\EmailValidator::class,
        'login' => \Validators\LoginValidator::class,
        'password' => \Validators\PasswordValidator::class,
        'min' => \Validators\MinValidator::class,
        'max' => \Validators\MaxValidator::class
    ],
    'routeAppMiddleware' => [
        'trim' => Middlewares\TrimMiddleware::class,
    ],

];

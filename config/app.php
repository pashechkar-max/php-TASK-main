<?php

return [
    'providers' => [
        'kernel' => \Providers\KernelProvider::class,
        'db' => \Providers\DBProvider::class,
        'auth' => \Providers\AuthProvider::class,
        'route' => \Providers\RouteProvider::class,
    ],
    'api_token_key' => 'php-task-api-secret',
    'auth' => \Src\Auth\Auth::class,
    'identity' => \Model\User::class,
    'routeMiddleware' => [
        'auth' => Middlewares\AuthMiddleware::class,
        'apiAuth' => Middlewares\ApiAuthMiddleware::class,
    ],
    'validators' => [
        'required' => \Validators\RequireValidator::class,
        'unique' => \Validators\UniqueValidator::class,
        'kiril' => \Validators\KirilValidator::class,
        'email' => \Validators\EmailValidator::class,
        'login' => \Validators\LoginValidator::class,
        'password' => \Validators\PasswordValidator::class,
        'min' => \Validators\MinValidator::class,
        'max' => \Validators\MaxValidator::class,
    ],
    'routeAppMiddleware' => [
        'trim' => Middlewares\TrimMiddleware::class,
        'json' => \Middlewares\JSONMiddleware::class,
        'specialChars' => \Middlewares\SpecialCharsMiddleware::class,
        'csrf' => \Middlewares\CSRFMiddleware::class,
    ],
];

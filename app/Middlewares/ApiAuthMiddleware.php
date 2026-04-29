<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;
use Src\View;

class ApiAuthMiddleware
{
    public function handle(Request $request): Request
    {
        $token = $request->bearerToken();

        if (!$token || !Auth::attemptToken($token)) {
            (new View())->toJSON([
                'success' => false,
                'message' => 'Bearer token is missing or invalid',
            ], 401);
        }

        return $request;
    }
}

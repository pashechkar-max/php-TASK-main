<?php

namespace Middlewares;

use Src\Request;

class JSONMiddleware
{
    public function handle(Request $request): Request
    {
        if ($request->method === 'GET') {
            return $request;
        }

        $contentType = $request->headers['Content-Type'] ?? $request->headers['content-type'] ?? '';
        if (strpos($contentType, 'application/json') === false) {
            return $request;
        }

        $data = json_decode(file_get_contents('php://input'), true) ?? [];
        foreach ($data as $key => $value) {
            $request->set($key, $value);
        }

        return $request;
    }
}

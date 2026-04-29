<?php

namespace Controller;

use Model\Items;
use Src\Auth\Auth;
use Src\Request;
use Src\View;

class Api
{
    public function login(Request $request): void
    {
        $credentials = [
            'login' => $request->get('login') ?? '',
            'password' => $request->get('password') ?? '',
        ];

        if (!Auth::attempt($credentials)) {
            (new View())->toJSON([
                'success' => false,
                'message' => 'Invalid login or password',
            ], 401);
        }

        $user = Auth::user();
        (new View())->toJSON([
            'success' => true,
            'token_type' => 'Bearer',
            'token' => Auth::token($user),
            'user' => $this->userData($user),
        ]);
    }

    public function items(Request $request): void
    {
        $query = $request->get('search') ?? '';
        $items = Items::query();

        if ($query !== '') {
            $items->where('item_name', 'LIKE', "%$query%")
                ->orWhere('sku', 'LIKE', "%$query%");
        }

        (new View())->toJSON([
            'success' => true,
            'items' => $items->get()->toArray(),
        ]);
    }

    public function me(Request $request): void
    {
        (new View())->toJSON([
            'success' => true,
            'user' => $this->userData(Auth::user()),
        ]);
    }

    public function echo(Request $request): void
    {
        (new View())->toJSON($request->all());
    }

    private function userData($user): array
    {
        return [
            'id' => $user->user_id,
            'surname' => $user->surname,
            'name' => $user->name,
            'patronymic' => $user->patronymic,
            'email' => $user->email,
            'login' => $user->login,
        ];
    }
}

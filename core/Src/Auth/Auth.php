<?php

namespace Src\Auth;

use Src\Session;

class Auth
{
    //Свойство для хранения любого класса, реализующего интерфейс IdentityInterface
    private static IdentityInterface $user;

    //Инициализация класса пользователя
    public static function init(IdentityInterface $user): void
    {
        self::$user = $user;
        if (self::user()) {
            self::login(self::user());
        }
    }

    //Вход пользователя по модели
    public static function login(IdentityInterface $user): void
    {
        self::$user = $user;
        Session::set('id', self::$user->getId());
    }

    //Аутентификация пользователя и вход по учетным данным
    public static function attempt(array $credentials): bool
    {
        if ($user = self::$user->attemptIdentity($credentials)) {
            self::login($user);
            return true;
        }
        return false;
    }

    public static function token(IdentityInterface $user): string
    {
        $payload = self::base64UrlEncode((string)$user->getId());
        return $payload . '.' . self::tokenSignature($payload, $user);
    }

    public static function attemptToken(string $token): bool
    {
        $parts = explode('.', $token);
        if (count($parts) !== 2) {
            return false;
        }

        [$payload, $signature] = $parts;
        $id = (int)self::base64UrlDecode($payload);
        $user = self::$user->findIdentity($id);

        if (!$user || !hash_equals(self::tokenSignature($payload, $user), $signature)) {
            return false;
        }

        self::login($user);
        return true;
    }

    //Возврат текущего аутентифицированного пользователя
    public static function user()
    {
        $id = Session::get('id') ?? 0;
        return self::$user->findIdentity($id);
    }

    //Проверка является ли текущий пользователь аутентифицированным
    public static function check(): bool
    {
        if (self::user()) {
            return true;
        }
        return false;
    }

    //Выход текущего пользователя
    public static function logout(): bool
    {
        Session::clear('id');
        return true;
    }

    public static function generateCSRF(): string
    {
        $token = md5(time());
        Session::set('csrf_token', $token);
        return $token;
    }

    private static function tokenSignature(string $payload, IdentityInterface $user): string
    {
        $secret = app()->settings->app['api_token_key'] ?? 'php-task-api-secret';
        $password = $user->password ?? '';
        return hash_hmac('sha256', $payload . '|' . $password, $secret);
    }

    private static function base64UrlEncode(string $value): string
    {
        return rtrim(strtr(base64_encode($value), '+/', '-_'), '=');
    }

    private static function base64UrlDecode(string $value): string
    {
        return base64_decode(strtr($value, '-_', '+/')) ?: '';
    }

}

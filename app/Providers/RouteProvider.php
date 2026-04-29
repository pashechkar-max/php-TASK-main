<?php

namespace Providers;

use Src\Provider\AbstractProvider;
use Src\Route;

class RouteProvider extends AbstractProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        $this->app->bind('route', Route::single()->setPrefix($this->app->settings->getRootPath()));

        if ($this->checkPrefix('/api')) {
            $this->app->settings->removeAppMiddleware('csrf');
            $this->app->settings->removeAppMiddleware('specialChars');

            require_once __DIR__ . '/../..' . $this->app->settings->getRoutePath() . '/api.php';
            return;
        }

        $this->app->settings->removeAppMiddleware('json');
        require_once __DIR__ . '/../..' . $this->app->settings->getRoutePath() . '/web.php';
    }

    private function getUri(): string
    {
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        return substr($uri, strlen($this->app->settings->getRootPath()));
    }

    private function checkPrefix(string $prefix): bool
    {
        return strpos($this->getUri(), $prefix) === 0;
    }
}

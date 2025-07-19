<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\{
    HomeController,
    AuthController
};

function registerRoutes(App $app): void
{
    $app->get('/', [HomeController::class, 'index']);

    $app->get('/register', [AuthController::class, 'registerView']);
    $app->post('/register', [AuthController::class, 'register']);
}

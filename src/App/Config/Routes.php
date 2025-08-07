<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\{
    HomeController,
    AuthController,
    PostingController,
    UploadController,
    ErrorController
};
use App\Middleware\{
    AuthRequiredMiddleware,
    GuestOnlyMiddleware
};

function registerRoutes(App $app): void
{
    $app->get('/', [HomeController::class, 'index'])->add(AuthRequiredMiddleware::class);

    $app->get('/postings', [PostingController::class, 'index'])->add(AuthRequiredMiddleware::class);
    $app->get('/postings/create', [PostingController::class, 'create'])->add(AuthRequiredMiddleware::class);
    $app->post('/postings', [PostingController::class, 'store'])->add(AuthRequiredMiddleware::class);
    $app->get('/postings/{posting}', [PostingController::class, 'show'])->add(AuthRequiredMiddleware::class);
    $app->get('/postings/{posting}/edit', [PostingController::class, 'edit'])->add(AuthRequiredMiddleware::class);
    $app->put('/postings/{posting}', [PostingController::class, 'update'])->add(AuthRequiredMiddleware::class);
    $app->delete('/postings/{posting}', [PostingController::class, 'destroy'])->add(AuthRequiredMiddleware::class);

    $app->get('/uploads/{upload}/download', [UploadController::class, 'download'])->add(AuthRequiredMiddleware::class);

    $app->get('/register', [AuthController::class, 'showRegister'])->add(GuestOnlyMiddleware::class);
    $app->post('/register', [AuthController::class, 'register'])->add(GuestOnlyMiddleware::class);
    $app->get('/login', [AuthController::class, 'showLogin'])->add(GuestOnlyMiddleware::class);
    $app->post('/login', [AuthController::class, 'login'])->add(GuestOnlyMiddleware::class);
    $app->post('/logout', [AuthController::class, 'logout'])->add(AuthRequiredMiddleware::class);

    $app->setErrorHandler([ErrorController::class, 'notFound']);
}

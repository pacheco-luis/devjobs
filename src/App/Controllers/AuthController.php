<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{
    ValidatorService,
    UserService
};

class AuthController
{
    public function __construct(
        private TemplateEngine $view,
        private ValidatorService $validatorService,
        private UserService $userService
    )
    {
    }

    public function showRegister(): void
    {
        echo $this->view->render('register.php', [
            'title' => 'Register',
        ]);
    }

    public function register(): void
    {
        $this->validatorService->validateRegister($_POST);

        $this->userService->isEmailTaken($_POST['email']);

        $this->userService->create($_POST);

        redirectTo('/');
    }

    public function showLogin(): void
    {
        echo $this->view->render('login.php', [
            'title' => 'Login',
        ]);
    }

    public function login(): void
    {
        $this->validatorService->validateLogin($_POST);

        $this->userService->login($_POST);

        redirectTo('/');
    }

    public function logout(): void
    {
        $this->userService->logout();

        redirectTo('/login');
    }
}

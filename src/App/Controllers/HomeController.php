<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Config\Paths;

class HomeController
{
    public function __construct(private TemplateEngine $view)
    {
    }

    public function index(): void
    {
        echo $this->view->render('index.php', [
            'title' => 'Home',
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => '/'],
                ['label' => 'Jobs', 'url' => null],
            ],
        ]);
    }
}

<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\ApplicationService;

class ApplicationController
{
    public function __construct(
        private TemplateEngine $view,
        private ApplicationService $applicationService
    )
    {
    }

    public function index(): void
    {
        $page = $_GET['page'] ?? 1;
        $page = (int) $page;
        $length = 4;
        $offset = ($page - 1) * $length;

        [$applications, $count] = $this->applicationService->getUserApplications($length, $offset);

        $lastPage = ceil($count / $length);

        $pages = $lastPage ? range(1, $lastPage) : [];

        $pageLinks = array_map(
            fn($pageNum) => http_build_query([
                'page' => $pageNum,
            ]),
            $pages
        );

        echo $this->view->render('/applications/index.php', [
            'title' => 'Applications',
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => '/'],
                ['label' => 'Applications', 'url' => null],
            ],
            'applications' => $applications,
            'currentPage' => $page,
            'previousPageQuery' => http_build_query([
                'page' => $page - 1,
            ]),
            'lastPage' => $lastPage,
            'nextPageQuery' => http_build_query([
                'page' => $page + 1,
            ]),
            'pageLinks' => $pageLinks,
        ]);
    }
}

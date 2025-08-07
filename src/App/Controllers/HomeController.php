<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\PostingService;

class HomeController
{
    public function __construct(
        private TemplateEngine $view,
        private PostingService $postingService
    )
    {
    }

    public function index(): void
    {
        $page = $_GET['page'] ?? 1;
        $page = (int) $page;
        $length = 4;
        $offset = ($page - 1) * $length;
        $searchTerm = $_GET['keywords'] ?? null;

        [$postings, $count] = $this->postingService->getPostings($length, $offset);

        $lastPage = ceil($count / $length);

        $pages = $lastPage ? range(1, $lastPage) : [];

        $pageLinks = array_map(
            fn($pageNum) => http_build_query([
                'page' => $pageNum,
                'keywords' => $searchTerm,
            ]),
            $pages
        );

        echo $this->view->render('index.php', [
            'title' => 'Home',
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => '/'],
                ['label' => 'Jobs', 'url' => null],
            ],
            'postings' => $postings,
            'currentPage' => $page,
            'previousPageQuery' => http_build_query([
                'page' => $page - 1,
                'keywords' => $searchTerm,
            ]),
            'lastPage' => $lastPage,
            'nextPageQuery' => http_build_query([
                'page' => $page + 1,
                'keywords' => $searchTerm,
            ]),
            'pageLinks' => $pageLinks,
            'keywords' => $searchTerm,
        ]);
    }
}

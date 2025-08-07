<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{
    ValidatorService,
    PostingService,
    UploadService
};

class PostingController
{
    public function __construct(
        private TemplateEngine $view,
        private ValidatorService $validatorService,
        private PostingService $postingService,
        private UploadService $uploadService
    )
    {
    }

    public function index(): void
    {
        $page = $_GET['page'] ?? 1;
        $page = (int) $page;
        $length = 4;
        $offset = ($page - 1) * $length;

        [$postings, $count] = $this->postingService->getUserPostings($length, $offset);

        $lastPage = ceil($count / $length);

        $pages = $lastPage ? range(1, $lastPage) : [];

        $pageLinks = array_map(
            fn($pageNum) => http_build_query([
                'page' => $pageNum,
            ]),
            $pages
        );

        echo $this->view->render('/postings/index.php', [
            'title' => 'Postings',
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => '/'],
                ['label' => 'Postings', 'url' => null],
            ],
            'postings' => $postings,
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

    public function show(array $params): void
    {
        $posting = $this->postingService->getPosting($params['posting']);

        if (!$posting) {
            redirectTo('/');
        }

        echo $this->view->render('postings/show.php', [
            'title' => $posting['position'],
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => '/'],
                ['label' => 'Postings', 'url' => '/postings'],
                ['label' => $posting['position'], 'url' => null],
            ],
            'posting' => $posting,
        ]);
    }

    public function create(): void
    {
        echo $this->view->render('postings/create.php', [
            'title' => 'Create Job',
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => '/'],
                ['label' => 'Postings', 'url' => '/postings'],
                ['label' => 'Create', 'url' => null],
            ],
        ]);
    }

    public function store(): void
    {
        $formData = [...$_POST, ...$_FILES];

        $this->validatorService->validatePosting($formData);

        $uploadId = $this->uploadService->upload($_FILES['logo']);

        $this->postingService->create($formData, $uploadId);

        redirectTo('/');
    }

    public function edit(array $params): void
    {
        $posting = $this->postingService->getUserPosting($params['posting']);

        if (!$posting) {
            redirectTo('/');
        }

        echo $this->view->render('postings/edit.php', [
            'title' => 'Edit Posting',
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => '/'],
                ['label' => 'Postings', 'url' => '/postings'],
                ['label' => $posting['position'], 'url' => '/postings/' . $params['posting']],
                ['label' => 'Edit', 'url' => null],
            ],
            'posting' => $posting,
        ]);
    }

    public function update(array $params): void
    {
        $posting = $this->postingService->getUserPosting($params['posting']);

        if (!$posting) {
            redirectTo('/');
        }

        $this->validatorService->validateUpdatePosting($_POST);

        $this->postingService->update($_POST, $posting['id']);

        redirectTo($_SERVER['HTTP_REFERER']);
    }

    public function destroy(array $params): void
    {
        $posting = $this->postingService->getUserPosting($params['posting']);

        if (empty($posting)) {
            redirectTo('/');
        }

        $this->postingService->delete($posting['id']);

        $file = $this->uploadService->getFile($posting['logo_upload_id']);

        if (empty($file)) {
            redirectTo('/');
        }

        $this->uploadService->delete($file);

        redirectTo('/');
    }
}

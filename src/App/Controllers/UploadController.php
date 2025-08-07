<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\UploadService;

class UploadController
{
    public function __construct(private UploadService $uploadService)
    {
    }

    public function download(array $params): void
    {
        $file = $this->uploadService->getFile($params['upload']);

        $this->uploadService->read($file);
    }
}

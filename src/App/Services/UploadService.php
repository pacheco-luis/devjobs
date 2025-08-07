<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;
use Framework\Exceptions\ValidationException;
use App\Config\Paths;

class UploadService
{
    public function __construct(private Database $db)
    {
    }

    public function upload(array $file): int
    {
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newFilename = bin2hex(random_bytes(16)) . "." . $fileExtension;

        $uploadPath = Paths::STORAGE_UPLOADS . "/" . $newFilename;

        if (!move_uploaded_file($file['tmp_name'], $uploadPath)) {
            throw new ValidationException([
                'logo' => ['Failed to upload file.']
            ]);
        }

        $this->db->query(
            "INSERT INTO uploads (
                     original_filename, storage_filename, media_type
            ) VALUES (
                     :original_filename, :storage_filename, :media_type
            )",
            [
                'original_filename' => $file['name'],
                'storage_filename' => $newFilename,
                'media_type' => $file['type']
            ]
        );

        return (int) $this->db->id();
    }

    public function getFile(string $id): mixed
    {
        return $this->db->query(
            "SELECT * FROM uploads WHERE id = :id",
            [
                'id' => $id
            ]
        )->find();
    }

    public function read(array $file): void
    {
        $filePath = Paths::STORAGE_UPLOADS . "/" . $file['storage_filename'];

        if (!file_exists($filePath)) {
            redirectTo('/');
        }

        header("Content-Disposition: inline;filename=" . $file['original_filename']);
        header("Content-Type: " . $file['media_type']);

        readfile($filePath);
    }

    public function delete(array $file): void
    {
        $filePath = Paths::STORAGE_UPLOADS . "/" . $file['storage_filename'];

        unlink($filePath);

        $this->db->query(
            "DELETE FROM uploads WHERE id = :id",
            [
                'id' => $file['id']
            ]
        );
    }
}

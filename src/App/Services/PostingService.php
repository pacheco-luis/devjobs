<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;

class PostingService
{
    public function __construct(private Database $db)
    {
    }

    public function create(array $formData, int $uploadId): void
    {
        $this->db->query(
            "INSERT INTO jobs (
                  user_id, logo_upload_id, company, position, contract, location, website, description, requirements, role
            ) VALUES (
                  :user_id, :logo_upload_id, :company, :position, :contract, :location, :website, :description, :requirements, :role
            )",
            [
                'user_id' => $_SESSION['user'],
                'logo_upload_id' => $uploadId,
                'company' => $formData['company'],
                'position' => $formData['position'],
                'contract' => $formData['contract'],
                'location' => $formData['location'],
                'website' => $formData['website'],
                'description' => $formData['description'],
                'requirements' => $formData['requirements'],
                'role' => $formData['role'],
            ]
        );
    }

    public function getPostings(int $length, int $offset): array
    {
        $searchTerm = addcslashes($_GET['keywords'] ?? '', '%_');
        $params = [
            'company' => "%{$searchTerm}%",
        ];

        $postings = $this->db->query(
            "SELECT *, DATE_FORMAT(posted_at, '%Y-%m-%d') AS formatted_date FROM jobs WHERE company LIKE :company LIMIT {$length} OFFSET {$offset}",
            $params
        )->findAll();

        $postingCount = $this->db->query(
            "SELECT COUNT(*) FROM jobs WHERE company LIKE :company",
            $params
        )->count();

        return [$postings, $postingCount];
    }

    public function getPosting(string $id): mixed
    {
        return $this->db->query(
            "SELECT *, date_format(posted_at, '%Y-%m-%d') AS formatted_date FROM jobs WHERE id = :id",
            [
                'id' => $id,
            ]
        )->find();
    }

    public function getUserPostings(int $length, int $offset): array
    {
        $params = [
            'user_id' => $_SESSION['user'],
        ];

        $postings = $this->db->query(
            "SELECT *, DATE_FORMAT(posted_at, '%Y-%m-%d') AS formatted_date FROM jobs WHERE user_id = :user_id LIMIT {$length} OFFSET {$offset}",
            $params
        )->findAll();

        $postingCount = $this->db->query(
            "SELECT COUNT(*) FROM jobs WHERE user_id = :user_id",
            $params
        )->count();

        return [$postings, $postingCount];
    }

    public function getUserPosting(string $id): mixed
    {
        return $this->db->query(
            "SELECT *, date_format(posted_at, '%Y-%m-%d') AS formatted_date FROM jobs WHERE id = :id AND user_id = :user_id",
            [
                'id' => $id,
                'user_id' => $_SESSION['user']
            ]
        )->find();
    }

    public function update(array $formData, int $id): void
    {
        $this->db->query(
            "UPDATE jobs SET company = :company, position = :position, contract = :contract, location = :location, website = :website, description = :description, requirements = :requirements, role = :role WHERE id = :id AND user_id = :user_id",
            [
                'id' => $id,
                'user_id' => $_SESSION['user'],
                'company' => $formData['company'],
                'position' => $formData['position'],
                'contract' => $formData['contract'],
                'location' => $formData['location'],
                'website' => $formData['website'],
                'description' => $formData['description'],
                'requirements' => $formData['requirements'],
                'role' => $formData['role'],
            ]
        );
    }

    public function delete(int $id): void
    {
        $this->db->query(
            "DELETE FROM jobs WHERE id = :id AND user_id = :user_id",
            [
                'id' => $id,
                'user_id' => $_SESSION['user']
            ]
        );
    }
}

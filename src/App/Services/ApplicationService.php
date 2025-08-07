<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;

class ApplicationService
{
    public function __construct(private Database $db)
    {
    }

    public function getUserApplications(int $length, int $offset): array
    {
        $params = [
            'user_id' => $_SESSION['user'],
        ];

        $applications = $this->db->query(
            "SELECT *, DATE_FORMAT(created_at, '%Y-%m-%d') AS formatted_date FROM applications WHERE user_id = :user_id LIMIT {$length} OFFSET {$offset}",
            $params
        )->findAll();

        $applicationCount = $this->db->query(
            "SELECT COUNT(*) FROM applications WHERE user_id = :user_id",
            $params
        )->count();

        return [$applications, $applicationCount];
    }
}

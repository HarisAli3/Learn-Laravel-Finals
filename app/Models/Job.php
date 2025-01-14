<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Job {
    public static function all(): array {
        return [
            [
                'id' => '1',
                'title' => 'Directory',
                'salary' => '$50,000'
            ],
            [
                'id' => '2',
                'title' => 'Programmer',
                'salary' => '$10,000'
            ]
        ];
    }

    public static function find(int $id): array|null {
        // Use `Arr::first` to locate the job by id
        return Arr::first(static::all(), fn($job) => intval($job['id']) === $id);
    }
}

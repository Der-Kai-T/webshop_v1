<?php

namespace Database\Seeders;

use App\Models\HistoryStatus;
use Illuminate\Database\Seeder;

class HistoryStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            "created",
            "confirmed",
            "ordered",
            "delivered",
        ];

        foreach ($statuses as $status) {
            HistoryStatus::create([
                "name" => $status,
            ]);
        }
    }
}

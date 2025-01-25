<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Competition;
use App\Models\PhotoCategory;

class CompetitionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $competitions = Competition::all();

        foreach ($competitions as $competition) {
            $categoryIds = PhotoCategory::pluck('id');
            $competition->categories()->sync($categoryIds);
        }
    }
}

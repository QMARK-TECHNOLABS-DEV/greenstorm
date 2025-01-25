<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PhotoCategory;
class PhotoCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'title' => 'Category 1 <small>( Camera )</small>',
                'description' => 'Images clicked using DSLR/Mirrorless cameras.',
            ],
            [
                'title' => 'Category 2 <small>( Mobile )</small>',
                'description' => 'Images clicked using mobile/smartphone cameras.',
            ],
        ];
        PhotoCategory::insert($categories);
    }
}

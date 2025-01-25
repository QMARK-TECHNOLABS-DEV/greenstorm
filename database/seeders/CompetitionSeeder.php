<?php

namespace Database\Seeders;
use App\Models\Competition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompetitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prizes_described = [
            [
                "category" => "CATEGORY 1",
                "prizes" => [
                    [
                        "position" => "Winner",
                        "amount" => "10,000 USD"
                    ],
                    [
                        "position" => "Runner-up",
                        "amount" => "5,000 USD"
                    ],
                    [
                        "position" => "Second Runner-up",
                        "amount" => "3,000 USD"
                    ],
                    [
                        "position" => "Three Special Mentions",
                        "amount" => "3 x 1,000 USD"
                    ]
                ]
            ],
            [
                "category" => "CATEGORY 2",
                "prizes" => [
                    [
                        "position" => "Winner",
                        "amount" => "3,000 USD"
                    ],
                    [
                        "position" => "Runner-up",
                        "amount" => "2,000 USD"
                    ],
                    [
                        "position" => "Second Runner-up",
                        "amount" => "1,000 USD"
                    ]
                ]
            ]
        ];
        Competition::create([
            'title' => 'Competition 1',
            'year' => '2023',
            'period' => '2022-2023', 
            'prizes_described' => json_encode($prizes_described),
            'status' => 'active',
            'vote_date' => null,
            'prize_announcement_date' => null
        ]);
    } 
}

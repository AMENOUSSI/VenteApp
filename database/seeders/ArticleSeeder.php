<?php

namespace Database\Seeders;
use App\Models\Article;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::factory()
            ->count(10)
            ->hasConference(5)
            ->create();

        Article::factory()
            ->count(20)
            ->hasConference(10)
            ->create();

        Article::factory()
            ->count(15)
            ->create();
    }
}

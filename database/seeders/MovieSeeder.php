<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $movies = [
            [
                'title' => 'Puss in Boots',
                'photo' => 'images/pussinboots.png',
                'publish_date' => '2011-11-25',
                'description' => 'Puss in Boots teams up with Humpty Dumpty and Kitty Softpaws to find magic beans and clear his name in a thrilling adventure.',
                'genre_id' => 3,
            ]
        ];

        DB::table('movies')->insert($movies);
    }
}

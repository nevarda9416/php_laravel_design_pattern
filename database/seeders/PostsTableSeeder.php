<?php

namespace Database\Seeders;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Posts::query()->truncate();
        Posts::factory()->count(500)->create();
    }
}

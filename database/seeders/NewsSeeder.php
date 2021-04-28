<?php

namespace Database\Seeders;

use App\Models\News as Model;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::factory()->count(20)->create();
    }
}

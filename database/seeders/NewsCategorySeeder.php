<?php

namespace Database\Seeders;

use App\Models\NewsCategory as Model;
use Illuminate\Database\Seeder;

class NewsCategorySeeder extends Seeder
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

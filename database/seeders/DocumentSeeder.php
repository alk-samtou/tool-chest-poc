<?php

namespace Database\Seeders;

use App\Models\Document as Model;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
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

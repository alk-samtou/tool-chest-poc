<?php

namespace Database\Seeders;

use App\Models\DocumentCategory as Model;
use Illuminate\Database\Seeder;

class DocumentCategorySeeder extends Seeder
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

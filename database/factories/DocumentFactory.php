<?php

namespace Database\Factories;

use App\Models\Document as Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'added_by_user' => $this->faker->uuid,
            'document_category_id' => $this->faker->uuid,
            'document_permission' => $this->faker->numberBetween(0,3),
            'password' => $this->faker->password,
            'title' => 'Document '. $this->faker->colorName,
            'description' => $this->faker->words(5,true),
            'original_file_name' => 'original-file-'.$this->faker->colorName.'.zip',
            'file_name' => 'file-'.$this->faker->colorName.'.zip',
            'file_path' => $this->faker->colorName,
            'is_featured' => $this->faker->numberBetween(0,1),
            'is_hidden' => $this->faker->numberBetween(0,1),
        ];
    }
}

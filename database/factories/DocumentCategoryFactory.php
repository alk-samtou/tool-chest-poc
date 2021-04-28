<?php

namespace Database\Factories;

use App\Models\DocumentCategory as Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentCategoryFactory extends Factory
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
            'name' => 'Document Category '.ucfirst($this->faker->colorName),
            'description' => $this->faker->words(3,true),
        ];
    }
}

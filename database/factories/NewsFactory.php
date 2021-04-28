<?php

namespace Database\Factories;

use App\Models\News as Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
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
            'news_category_id' => $this->faker->uuid,
            'title' => $this->faker->slug,
            'slug' => $this->faker->slug,
            'description' => $this->faker->paragraphs(2,true),
            'details' => $this->faker->paragraphs(5,true),
            'featured_image' => 'https://images.unsplash.com/photo-1617877197453-32f4d0381abe?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
            'is_hidden' => $this->faker->numberBetween(0,1),
        ];
    }
}

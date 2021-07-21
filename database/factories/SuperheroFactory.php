<?php

namespace Database\Factories;

use App\Models\Superhero;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SuperheroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Superhero::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nickname'           => $this->faker->name(),
            'origin_description' => 'description',
            'superpowers'        => 'sadasdasdsd',
            'catch_phrase'       => 'sdafdfdfs',
            'real_name'          => $this->faker->firstName(),
            'image'              => Str::random(10) . '.png',

        ];
    }
}

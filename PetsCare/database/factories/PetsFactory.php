<?php

namespace Database\Factories;

use App\Models\Pets;
use Illuminate\Database\Eloquent\Factories\Factory;

class PetsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pets::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_profile_id' => $this->faker->randomDigitNotNull,
        'pet_type' => $this->faker->word,
        'pet_breed' => $this->faker->word,
        'pet_age' => $this->faker->word,
        'has_medical_condition' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

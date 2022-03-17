<?php

namespace Database\Factories;

use App\Models\ClientProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClientProfile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->word,
        'user_id' => $this->faker->randomDigitNotNull,
        'first_name' => $this->faker->word,
        'last_name' => $this->faker->word,
        'address' => $this->faker->word,
        'phone_number' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

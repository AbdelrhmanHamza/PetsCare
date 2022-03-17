<?php

namespace Database\Factories;

use App\Models\BusinessProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

class BusinessProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BusinessProfile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomDigitNotNull,
        'business_type' => $this->faker->randomElement(['ranch', 'hotel', 'private']),
        'business_name' => $this->faker->word,
        'address' => $this->faker->word,
        'phone_number' => $this->faker->word,
        'service_description' => $this->faker->word,
        'open_at' => $this->faker->word,
        'close_at' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\SubscribtionPackage;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscribtionPackageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubscribtionPackage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->word,
        'subscribtion_package_name' => $this->faker->word,
        'subscribtion_package_description' => $this->faker->word,
        'activation_period' => $this->faker->randomDigitNotNull,
        'subscribtion_package_price' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\ServicePackage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServicePackageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ServicePackage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->word,
        'package_name' => $this->faker->word,
        'package_description' => $this->faker->word,
        'package_price' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

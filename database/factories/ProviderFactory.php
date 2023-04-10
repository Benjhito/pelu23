<?php

namespace Database\Factories;

use App\Models\IvaType;
use App\Models\Province;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Provider>
 */
class ProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => fake()->unique()->numberBetween(101, 200),
            'fantasy' => fake()->name(),
            'business_name' => fake()->name(),
            'address' => fake()->sentence(2),
            'postcode' => Str::random(8),
            'locality' => fake()->sentence(2),
            'province_id' => Province::all()->random()->id,
            //'country' => Str::random(40),
            'phone1' => Str::random(14),
            'phone2' => Str::random(14),
            'email' => fake()->unique()->safeEmail(),
            'acc_type' => fake()->randomElement(['C', 'A']),
            'acc_number' => Str::random(15),
            'cuit' => Str::random(13),
            'iva_type_id' => IvaType::all()->random()->id,
            'inv_type' => fake()->randomElement(['A', 'B', 'C']),
            'contact' => fake()->name(),
        ];
    }
}

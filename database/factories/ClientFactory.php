<?php

namespace Database\Factories;

use App\Models\DocType;
use App\Models\IvaType;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => fake()->unique()->numberBetween(1001, 1100),
            'business_name' => fake()->name(),
            'address' => fake()->sentence(2),
            'postcode' => Str::random(8),
            'locality' => fake()->sentence(2),
            'mobile' => Str::random(14),
            'phone' => Str::random(14),
            'email' => fake()->unique()->safeEmail(),
            'doc_type_id' => DocType::all()->random()->id,
            'cuit' => Str::random(13),
            'iva_type_id' => IvaType::all()->random()->id,
            'inv_type' => fake()->randomElement(['A', 'B', 'M']),
            'status' => fake()->randomElement(['A', 'S']),
        ];
    }
}

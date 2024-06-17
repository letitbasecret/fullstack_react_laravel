<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Register>
 */
class RegisterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
               "name"=>fake()->name(),
               "email"=>fake()->email(),
               "password"=>fake()->password(),
               "phone"=>fake()->phoneNumber(),
            "remember_token"=>fake()->phoneNumber(),        ];
    }
}

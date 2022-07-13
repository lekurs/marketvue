<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->name;
        $slug = Str::lower(str_replace([' ', '.'], ['-', ''], $name));

        return [
            'name' => $name,
            'baseline' => $this->faker->realText(100),
            'description' => $this->faker->realText(300),
            'address1' => $this->faker->address,
            'address2' => $this->faker->address,
            'zip' => $this->faker->numerify('#####'),
            'city' => $this->faker->city,
            'phone' => $this->faker->numerify('##########'),
            'email' => $this->faker->email,
            'active' => $this->faker->boolean,
            'show_informations' => $this->faker->boolean,
            'slug' => $slug,
            'user_id' => User::all()->random()->id,
        ];
    }
}

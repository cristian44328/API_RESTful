<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nombre'=>$this->faker->name,
            'descripcion'=>$this->faker->text(30),
            'precio'=>rand(10, 100),
            'cantidad'=>rand(1, 100)
        ];
    }
}

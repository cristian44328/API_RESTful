<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
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
            'login_usuario' => $this->faker->userName(),         
            'nombre' => $this->faker->firstName(),               
            'apellidos' => $this->faker->lastName(),             
            'edad' => rand(25, 70),
            'telefono' => $this->faker->phoneNumber(),
            'correo' => $this->faker->email(),
            'direccion' => $this->faker->address(),            
            'password' => bcrypt($this->faker->password())   
        ];
    }
}

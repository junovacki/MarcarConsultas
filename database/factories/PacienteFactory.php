<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'dataCadastro' => $this->faker->date(),
            'telefone' => $this->faker->phoneNumber(),
            'cpf' => $this->faker->countryCode(),
            'cep' => $this->faker->postcode(),
            'endereco' => $this->faker->streetName(),
            'numero_casa' => $this->faker->randomDigitNotNull(),
            'email' => $this->faker->unique()->safeEmail()
        ];
    }
}

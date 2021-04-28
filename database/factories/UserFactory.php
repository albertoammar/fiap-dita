<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'tipo' => 'cliente',
            'email' => $this->faker->unique()->safeEmail,
            'telefone' => $this->faker->phoneNumber,
            'idade' => $this->faker->numberBetween(18, 60),
            'estado_civil' => 'Casado(a)',
            'renda' => $this->faker->numberBetween(900, 7000),
            'estado' => 'SP',
            'cidade' => 'São Paulo',
            'bairro' => 'Vila Matilde',
        ];
    }
}

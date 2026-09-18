<?php

namespace Database\Factories;

use App\Models\Turma;
use App\Models\Curso;
use App\Models\Matricula;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Matricula>
 */
class MatriculaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numero' => fake()->numerify('MT-######'),
            'curso_id' => (Curso::All()->random())->id,
            'curso_id' => (Turma::All()->random())->id,
            'data_matricula' => fake()->date(),
        ];
    }
}

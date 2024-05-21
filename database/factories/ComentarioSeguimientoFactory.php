<?php

namespace Database\Factories;

use App\Models\ComentarioSeguimiento;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComentarioSeguimientoFactory extends Factory
{
    protected $model = ComentarioSeguimiento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_tarea' => $this->faker->numberBetween(28, 79),
            'comentario' => $this->faker->sentence($nbWords = 10, $variableNbWords = true),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

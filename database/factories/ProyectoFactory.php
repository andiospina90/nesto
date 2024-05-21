<?php

namespace Database\Factories;

use App\Models\Proyecto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProyectoFactory extends Factory
{
    protected $model = Proyecto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->sentence(3),
            'descripcion' => $this->faker->paragraph,
            'fecha_inicio' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'fecha_fin' => $this->faker->dateTimeBetween('now', '+1 year'),
            'estado' => $this->faker->randomElement([0, 1, 2]), // Asumiendo que los estados son 0, 1, y 2
            'presupuesto' => $this->faker->numberBetween(1000, 100000),
            'id_empresa' => 7, // Genera una empresa asociada usando la factory de Empresa
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Tarea;
use Illuminate\Database\Eloquent\Factories\Factory;

class TareaFactory extends Factory
{
    protected $model = Tarea::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_proyecto' => $this->faker->numberBetween(7, 20),
            'estado' => $this->faker->randomElement([0, 1, 2]), // Asumiendo que los estados son 0, 1, y 2
            'nombre' => $this->faker->sentence(3),
            'descripcion' => $this->faker->paragraph,
            'prioridad' => $this->faker->randomElement([1, 2, 3]), // Asumiendo prioridades 1, 2, y 3
            'id_usuario' => $this->faker->randomElement([6, 7, 8, 9]), // Solo 6, 7, 8, o 9
        ];
    }
}

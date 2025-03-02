<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText(mt_rand(10, 255)),
            'description' => $this->faker->realText(),
            'due_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'status' => $this->faker->randomElement(['Выполнено', 'Не выполнено']), 
            'priority' => $this->faker->randomElement(['Низкий', 'Средний', 'Высокий']), 
            'category' => $this->faker->randomElement(['Работа', 'Дом', 'Личное']), 
        ];
    }
}

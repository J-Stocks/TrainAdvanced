<?php

namespace Database\Factories;

use App\Models\Train;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainFactory extends Factory
{
    protected $model = Train::class;

    public function definition()
    {
        $productionStart = $this->faker->dateTimeBetween('-120 years', 'now');
        $productionEnd = $this->faker->dateTimeBetween(
            $productionStart,
            (clone $productionStart)->modify('+20 years')
        );
        return [
            'make' => $this->faker->company,
            'model' => ucwords($this->faker->word),
            'production_start' => $productionStart,
            'production_end' => $productionEnd,
            'description' => $this->faker->paragraph,
            'editor_id' => User::all()->random()->id,
        ];
    }
}

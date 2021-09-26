<?php

namespace Database\Factories;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Factories\Factory;

class BankFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bank::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'income' => $this->faker->boolean(),
            'cash' => $this->faker->boolean(),
            'amount' => $this->faker->numberBetween(0, 5000),
            'notes' => $this->faker->paragraph(),
        ];
    }
}

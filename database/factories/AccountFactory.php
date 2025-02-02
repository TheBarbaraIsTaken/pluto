<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Account::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount' => $this->faker->numberBetween(1000,10000),
            'notes' => $this->faker->paragraph(),
            'income' => $this->faker->boolean(),
            'cash' => $this->faker->boolean(),
            'user_id' => User::all()->random()->id,
        ];
    }
}

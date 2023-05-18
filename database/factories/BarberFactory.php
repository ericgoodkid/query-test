<?php

namespace Database\Factories;

use App\Constants\BarberConstants;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            BarberConstants::FIRST_NAME  => $this->faker->firstName(),
            BarberConstants::MIDDLE_NAME => $this->faker->optional(.5)->lastName(),
            BarberConstants::LAST_NAME   => $this->faker->lastName(),
            BarberConstants::NICKNAME    => $this->faker->firstName()
        ];
    }
}

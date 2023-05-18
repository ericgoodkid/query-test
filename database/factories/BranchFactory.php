<?php

namespace Database\Factories;

use App\Constants\BranchConstants;
use Illuminate\Database\Eloquent\Factories\Factory;

class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            BranchConstants::CODE    => $this->faker->unique()->regexify('[A-Z]{5}'),
            BranchConstants::ADDRESS => $this->faker->address()
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Startups;
use Illuminate\Database\Eloquent\Factories\Factory;

class StartupsFactory extends Factory
{
    protected $model = Startups::class;

    public function definition(): array
    {
        return [
            'startup_name' => $this->faker->company(),
            'founder' => $this->faker->name(),
            'submission_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['Pending', 'Approved', 'Rejected']),
        ];
    }
}

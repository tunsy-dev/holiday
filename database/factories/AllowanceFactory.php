<?php

namespace Database\Factories;

use App\Models\Allowance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class AllowanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Allowance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    
        return [
            'name' => $this->faker->name,
            'year' => Carbon::now(),                    
            'number_hours_year' => 180,
            'user_id' => User::factory(),        
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\user;
use Illuminate\Database\Eloquent\Factories\Factory;

class userFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = user::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'lastname' => $this->faker->lastname,
            'ci' => $this->faker->ci,
            'address' => $this->faker->address,
            'phone' => $this->faker->phone,
            'user_id' => user::all()->random->id,
            'create_at'=> now()
        ];
    }
}

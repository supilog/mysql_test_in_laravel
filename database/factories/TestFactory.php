<?php

namespace Database\Factories;
use App\Models\Test;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestFactory extends Factory
{
    protected $model = Test::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'point' => $this->get_random_price(1000000)
        ];
    }

    public function get_random_price($max){
        return mt_rand(1, $max);
    }

}

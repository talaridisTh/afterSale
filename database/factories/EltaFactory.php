<?php

namespace Database\Factories;

use App\Models\Elta;
use Illuminate\Database\Eloquent\Factories\Factory;

class EltaFactory extends Factory {

    protected $model = Elta::class;

    public function definition()
    {
        return [
            "return_service" => $this->faker->boolean,
            "express_service" => $this->faker->boolean,
        ];
    }

}

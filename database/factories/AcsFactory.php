<?php

namespace Database\Factories;

use App\Models\Acs;
use Illuminate\Database\Eloquent\Factories\Factory;

class AcsFactory extends Factory {

    protected $model = Acs::class;

    public function definition()
    {
        $title = $this->faker->company;

        return [
            "name" => $title,
            "slug" => \Str::slug($title),
            "return_type" => $this->faker->company,
            "return_service" => $this->faker->boolean,
        ];
    }

}

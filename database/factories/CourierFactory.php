<?php

namespace Database\Factories;

use App\Models\Acs;
use App\Models\Courier;
use App\Models\Elta;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourierFactory extends Factory {

    protected $model = Courier::class;

    public function definition()
    {
        $courier = $this->courier();

        return [
            'courierable_id' => $courier::factory(),
            'courierable_type' => $courier,
        ];
    }

    public function courier()
    {
        return $this->faker->randomElement([
            Acs::class,
            Elta::class,
        ]);
    }

}

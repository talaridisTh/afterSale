<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Voucher;
use Illuminate\Database\Eloquent\Factories\Factory;

class VoucherFactory extends Factory {

    protected $model = Voucher::class;

    public function definition()
    {
        $title = $this->faker->company;

        return [
            "name" => $title,
            "user_id" => User::all()->random()->id,
            "slug" => \Str::slug($title, "-"),
            "COD_amount" => $this->faker->numberBetween(1, 20),
            "address" => $this->faker->address,
            "zipcode" => $this->faker->postcode,
            "phone" => 123,
        ];
    }

}

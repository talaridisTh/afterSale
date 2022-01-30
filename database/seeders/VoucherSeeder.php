<?php

namespace Database\Seeders;

use App\Models\Voucher;
use Illuminate\Database\Seeder;

class VoucherSeeder extends Seeder {

    public function run()
    {
        //
        Voucher::factory(["user_id"=>1])->count(100)->hasCourier(3)->create();
    }

}

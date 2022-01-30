<?php

namespace App\Services;

use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 *
 */
class VoucherService implements ServiceInterface {

    /**
     * @var CourierService
     */
    protected $courier;

    /**
     * @param CourierService $courier
     */
    public function __construct(CourierService $courier)
    {

        $this->courier = $courier;

    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function save(Request $request): mixed
    {

        $voucher = Voucher::create([
            "user_id" => 1, // auth()->id() if existed auth
            "COD_amount" => $request->COD_amount,
            "name" => $request->name,
            "slug" => (new Voucher())->createSlug($request->name),
            "address" => $request->address,
            "zipcode" => $request->zipcode,
            "phone" => $request->phone,
        ]);
        $this->courier->saveCourier($request, $voucher);

        return $voucher;
    }

    /**
     * @param Request $request
     * @param $voucher
     * @return mixed
     */
    public function update(Request $request, $voucher): mixed
    {

        $voucher->update([
            "COD_amount" => $request->COD_amount,
            "name" => $request->name,
            "address" => $request->address,
            "zipcode" => $request->zipcode,
            "phone" => $request->phone,
        ]);
        $this->courier->updateCourier($request, $voucher);

        return $voucher;
    }

}
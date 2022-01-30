<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

/**
 *
 */
class CourierService {

    /**
     * @var AcsService
     */
    /**
     * @var AcsService|EltaService
     */
    protected $acs, $elta;

    /**
     * @param AcsService $acs
     * @param EltaService $elta
     */
    public function __construct(AcsService $acs, EltaService $elta)
    {
        $this->acs = $acs;
        $this->elta = $elta;
    }

    /**
     * @param Request $request
     * @param $voucher
     * @return void
     */
    public function saveCourier(Request $request, $voucher): void
    {
        $provider = $this->{$request->courier}->save($request);
        $provider->courier()->create(["voucher_id" => $voucher->id]);
    }

    /**
     * @param Request $request
     * @param $voucher
     * @return void
     */
    public function updateCourier(Request $request, $voucher): void
    {

        [$className, $provider] = $this->getClass($request, $voucher);
        $newProvider = $this->{$request->courier}->update($request, $provider);
        Log::alert($newProvider);
        $voucher->courier->update([
            "courierable_type" => $className,
            "courierable_id" => $newProvider->id,
            "voucher_id" => $voucher->id,
        ]);
    }

    /**
     * @param Request $request
     * @param $voucher
     * @return array
     */
    private function getClass(Request $request, $voucher): array
    {
        $courier = Str::ucfirst($request->courier);
        $className = "App\Models\\" . $courier;
        $provider = $this->attachCourier($voucher, $className);

        return [$className, $provider];
    }

    /**
     * @param $voucher
     * @param string $className
     * @return mixed
     */
    private function attachCourier($voucher, string $className): mixed
    {

        if ($voucher->courier->courierable_type == $className) {
            $provider = $voucher->provider();
        } else {

            $voucher->provider()->delete();
            $provider = new $className;

        }

        return $provider;
    }

}
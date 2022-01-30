<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

/** @mixin \App\Models\Courier */
class CourierResource extends JsonResource {

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {

        $courierable = $this->courierable;

        return [
            "courier" => $courierable,
        ];
    }

}

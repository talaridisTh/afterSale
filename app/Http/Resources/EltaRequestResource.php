<?php

namespace App\Http\Resources;

use App\Models\Acs;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

/**
 *
 */
class EltaRequestResource extends JsonResource {

    /**
     * @param $request
     * @return array
     */
    public static function getRequest($request): array
    {
        return [
            "return_service" => $request->return_service,
            "express_service" => $request->express_service,
        ];
    }

}

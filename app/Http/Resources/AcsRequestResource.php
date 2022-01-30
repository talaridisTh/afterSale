<?php

namespace App\Http\Resources;

use App\Models\Acs;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

/**
 *
 */
class AcsRequestResource extends JsonResource {

    /**
     * @param $request
     * @return array
     */
    public static function getRequest($request): array
    {

        return [
            "return_service" => $request->return_service,
            "name" => $request->store_name,
            "slug" => (new Acs())->createSlug($request->store_name),
            "return_type" => $request->return_type,
        ];
    }

}

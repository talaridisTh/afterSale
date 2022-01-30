<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

/** @mixin \App\Models\User */
class UserResource extends JsonResource {

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            "id" => $this->id,
            $this->mergeWhen(false, [  // check if exist auth   auth()->user()
                "email" => $this->email,
                "created_at" => $this->created_at,
                "deleted_at" => $this->deleted_at,
            ]),
            "name" => $this->name,
            "slug" => $this->slug,

        ];
    }

}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

/** @mixin \App\Models\Voucher */
class VoucherResource extends JsonResource {

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "slug" => $this->slug,
            "user" => UserResource::make($this->user),
            "courier" => $this->courier?->courierable->load("courier"),
            "COD_amount" => $this->COD_amount,
            "address" => $this->address,
            "zipcode" => $this->zipcode,
            "phone" => $this->phone,
            "created_at" => $this->created_at,
            "deleted_at" => $this->deleted_at,
            "link" => [
                "edit" => route('voucher.edit', $this->slug),
            ],
        ];
    }

}

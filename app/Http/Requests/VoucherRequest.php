<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 *
 */
class VoucherRequest extends FormRequest {

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            "COD_amount" => "numeric",
            "name" => "required",
            "address" => "required",
            "zipcode" => "required",
            "phone" => "required_if:courier,==,elta",
            "store_name" => "required_if:courier,==,acs",
            "return_type" => Rule::requiredIf(function () {
                return (request()->courier === "acs" && request()->return_service === true);
            }),
        ];
    }

    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

}
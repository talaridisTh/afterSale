<?php

namespace App\Services;

use App\Http\Resources\AcsRequestResource;
use App\Models\Acs;
use Illuminate\Http\Request;

/**
 *
 */
class AcsService implements ServiceInterface {

    /**
     * @param $request
     * @return mixed
     */
    public function save($request): mixed
    {
        return Acs::create(AcsRequestResource::getRequest($request));

    }

    /**
     * @param Request $request
     * @param $model
     * @return mixed
     */
    public function update(Request $request, $model): mixed
    {

        return $model->updateOrCreate(["id" => $model->id], AcsRequestResource::getRequest($request));

    }

}
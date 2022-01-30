<?php

namespace App\Services;

use App\Http\Resources\EltaRequestResource;
use App\Models\Elta;
use Illuminate\Http\Request;

/**
 *
 */
class EltaService implements ServiceInterface {

    /**
     * @param Request $request
     * @return mixed
     */
    public function save(Request $request): mixed
    {
        return Elta::create(EltaRequestResource::getRequest($request));
    }

    /**
     * @param Request $request
     * @param $model
     * @return mixed
     */
    public function update(Request $request, $model): mixed
    {
     return   $model->updateOrCreate(["id" => $model->id], EltaRequestResource::getRequest($request));

    }

}
<?php

namespace App\Services;

use Illuminate\Http\Request;

/**
 *
 */
interface ServiceInterface {

    /**
     * @param Request $request
     * @return mixed
     */
    public function save(Request $request);

    /**
     * @param Request $request
     * @param $model
     * @return mixed
     */
    public function update(Request $request, $model);

}
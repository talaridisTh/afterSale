<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 *
 */
class Courier extends Model {

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return MorphTo
     */
    public function courierable(): MorphTo
    {
        return $this->morphTo();
    }

}
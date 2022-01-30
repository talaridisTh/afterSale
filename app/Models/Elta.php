<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 *
 */
class Elta extends Model {

    use HasFactory;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var string
     */
    protected $table = "elta";

    /**
     * @return MorphOne
     */
    public function courier(): MorphOne
    {
        return $this->morphOne(Courier::class, 'courierable');
    }

}
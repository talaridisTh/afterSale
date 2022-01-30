<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 *
 */
class Acs extends Model {

    use HasFactory, HasSlug;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return MorphOne
     */
    public function courier(): MorphOne
    {
        return $this->morphOne(Courier::class, 'courierable');
    }

}
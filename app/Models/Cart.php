<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    protected $guarded = [];

    function course() : BelongsTo {
        return $this->belongsTo(Course::class);
    }

    function user() : BelongsTo {
        return $this->belongsTo(user::class);
    }
}
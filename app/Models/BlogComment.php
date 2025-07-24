<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlogComment extends Model
{
    protected $guarded = [];

    function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    function blog() : BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }
}

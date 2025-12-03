<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Media extends Model
{
    protected $fillable = ['file'];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

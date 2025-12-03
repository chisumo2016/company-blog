<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{

    protected $fillable = [
        'post_id',
        'author',
        'email',
        'body',
        'photo',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function post() : BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function replies()
    {
        return $this->hasMany(CommentReply::class, 'comment_id');
    }

    public function scopeWhereIsActive($query, $active = 1)
    {
        return $query->where('is_active', $active);
    }
}

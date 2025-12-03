<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;


    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'slug',
        'excerpt',
        'description',
        'thumbnail',
        'is_published',
        'published_at',
    ];

    /**
     * Attribute casting
     */
    protected $casts = [
        'published_at' => 'datetime',
        'is_published' => 'boolean',
    ];

    /**
     * Use slug for route-model binding
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Automatically generate slug before saving
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (! $post->slug) {
                $post->slug = Str::slug($post->title);
            }
        });

        static::updating(function ($post) {
            if ($post->isDirty('title')) {
                $post->slug = Str::slug($post->title);
            }
        });
    }

    /**
     * Relationships
     */
    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->where('is_active', 1);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }



    /**
     * Scope for published posts
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    /**
     * Scope for search
     */
    public function scopeSearch($query, $term)
    {
        if (! $term) return $query;

        return $query->where('title', 'LIKE', "%$term%")
            ->orWhere('excerpt', 'LIKE', "%$term%")
            ->orWhere('description', 'LIKE', "%$term%");
    }

    /**
     * Accessor for short excerpt
     */
    public function getSummaryAttribute()
    {
        return Str::limit(strip_tags($this->description), 180);
    }

    function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $original = $slug;
        $counter = 1;

        while (Post::where('slug', $slug)->exists()) {
            $slug = $original . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

}

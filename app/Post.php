<?php

namespace App;

use App\Scopes\FilterScope;
use App\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'text', 'phone', 'email', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeLatestTitle($query)
    {
        return $query->orderBy('id', 'desc');
    }

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new FilterScope());
        static::addGlobalScope(new SearchScope());
    }
}

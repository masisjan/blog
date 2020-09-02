<?php

namespace App;

use App\Scopes\FilterScope;
use App\Scopes\SearchScope;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function post()
    {
        return $this->hasMany(Post::class);
    }
}

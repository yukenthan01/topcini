<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function parent() {
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function children() {
        return $this->hasMany(Category::class,'parent_id')->orderBy('name');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post', 'post_category', 'category_id', 'post_id');
    }
}

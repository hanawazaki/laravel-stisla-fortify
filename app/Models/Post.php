<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use Softdeletes;
    use HasFactory;

    protected $fillable = ['id', 'category_id', 'content', 'title', 'slug', 'summary', 'status', 'comments','featured'];

    public function categories(){
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag','post_tag');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}

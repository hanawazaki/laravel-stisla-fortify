<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog_Post_Tag extends Model 
{
    use HasFactory;
    use Softdeletes;
    
    protected $table = 'post_tag' ;
    protected $fillable = ['id', 'tag_id','post_id',];

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function tags()
    {
        return $this->hasMany('App\Models\Tag');
    }

}
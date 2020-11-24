<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Comment extends Model 
{

    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['id', 'post_id','status','created_at','updated_at','deleted_at'];

    public function post()
    {
        return $this->belongsTo('App\Models\Post', 'post_id');
    }

}
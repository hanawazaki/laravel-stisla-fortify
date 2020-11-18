<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use Softdeletes;
    use HasFactory;

    protected $fillable = ['id','content','title','slug'];
    protected $dates = ['deleted_at'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts(){
        return $this->belongsToMany('App\Models\Post','post_tags');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id','name','slug','description'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts(){
        return $this->hasMany('App\Models\Category','category_id');
    }
}

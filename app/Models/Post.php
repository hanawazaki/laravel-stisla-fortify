<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use Softdeletes;
    use HasFactory;

    protected $fillable = ['id','author_id','content','title','slug','summary','published','published_at'];


}

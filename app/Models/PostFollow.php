<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostFollow extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='post_follow';
    protected $fillable=['post_id','account_id'];

    public function baiduocfl(){
        return $this->belongsTo(Post::class,'post_id','id');
    }
}

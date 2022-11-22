<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypePost extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='type_post';
    protected $fillable=['name','description'];
}

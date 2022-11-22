<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeNewsCast extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='type_news_cast';
    protected $fillable=['name','description'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Account;
use App\Models\Catalogue;
use App\Models\TypePost;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="post";
    protected $fillable=[
        "account_id",
        "type_id",
        "catalogue_id",
        "title",
        "content",
        "image",
        "location",
    ];
    public function nguoiDang(){
        return $this->belongsTo(Account::class,'account_id','id');
    }
    public function loaiBaiDang(){
        return $this->belongsTo(TypePost::class,'type_id','id');
    }
    public function loaiDo(){
        return $this->belongsTo(Catalogue::class,'catalogue_id','id');
    }
}

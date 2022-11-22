<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Account;
use App\Models\TypeNewsCast;

class NewsCast extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="news_cast";
    protected $fillable=[
        "account_id",
        "type_id",
        "title",
        "content",
        "image",
    ];
    public function nguoiDang(){
        return $this->belongsTo(Account::class,'account_id','id');
    }
    public function loaiBanTin(){
        return $this->belongsTo(TypeNewsCast::class,'type_id','id');
    }
}

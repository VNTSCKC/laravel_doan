<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Account;
class Message extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='message';
    protected $fillable=['room_id','send_id','receive_id','content','readed'];
    public function nguoiGui(){
        return $this->belongsTo(Account::class,'send_id','id');
    }
    public function nguoiNhan(){
        return $this->belongsTo(Account::class,'receive_id','id');
    }
}

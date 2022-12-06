<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomMessage extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='room_message';
    protected $fillable=['first_user','second_user'];
    public function nguoiThuNhat(){
        return $this->belongsTo(Account::class,'first_user','id');
    }
    public function nguoiThuHai(){
        return $this->belongsTo(Account::class,'second_user','id');
    }
}

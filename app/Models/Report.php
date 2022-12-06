<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Account;

class Report extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='report';
    protected $fillable=['post_id','account_id','content'];
    public function nguoiBaoCao(){
        return $this->belongsTo(Account::class,'account_id','id');
    }

}

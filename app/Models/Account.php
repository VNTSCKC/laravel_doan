<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    protected $table="account";
    protected $fillable=["username","password","name","email","phone","address","dateofbirth","image","position","status_post","status","last_seen","token"];
}

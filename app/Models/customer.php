<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class customer extends Authenticatable


{
    use HasFactory, HasApiTokens;

    protected $guarded = [];

    public function GetCustAdd()
    {
        // return $this->belongsTo(Custaddresss::class, 'cust_id', 'id');
        return $this->belongsTo(Custaddresss::class ,'id','cust_id');
    }
    
}

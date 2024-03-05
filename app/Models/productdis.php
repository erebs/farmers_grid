<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productdis extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $table='productdis';

    public function GetName()
    {
        return $this->belongsTo(product::class, 'prod_id','id');
    }

    // public function GetUnit()
    // {
    //     return $this->belongsTo(product::class, 'prod_id','id');
    // }
}

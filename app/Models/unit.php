<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unit extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'units';

    public function GetProd()
    {
        return $this->belongsTo(product::class, 'prod_id', 'id');
    }
}

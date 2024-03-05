<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'products';

    public function GetProdCat()
    {
        return $this->belongsTo(product_category::class, 'product_category', 'id');
    }

    

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class disease extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'diseases';

    public function GetCat()
    {
        return $this->belongsTo(disease_category::class, 'disease_category','id');
    }


}

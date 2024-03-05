<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ordereditem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function GetUnit()
    {
        return $this->belongsTo(unit::class, 'unit_id', 'id');
    }

}

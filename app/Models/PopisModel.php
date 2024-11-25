<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopisModel extends Model
{
    /** @use HasFactory<\Database\Factories\PopisModelFactory> */
    use HasFactory;
    protected $table = 'popis';
    protected $guarded = [];

    public function magacini()
    {
        return $this->belongsTo(MagacinModel::class,'magacin','id');
    }
}

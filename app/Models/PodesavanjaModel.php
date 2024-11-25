<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PodesavanjaModel extends Model
{
    /** @use HasFactory<\Database\Factories\PodesavanjaModelFactory> */
    use HasFactory;
    protected $table = 'podesavanja';
    protected $guarded = [];
}

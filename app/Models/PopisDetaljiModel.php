<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopisDetaljiModel extends Model
{
    /** @use HasFactory<\Database\Factories\PopisDetaljiModelFactory> */
    use HasFactory;
    protected $table = 'popis_detalji';
    protected $guarded = [];
}

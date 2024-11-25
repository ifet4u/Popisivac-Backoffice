<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtikliModel extends Model
{
    /** @use HasFactory<\Database\Factories\ArtikliModelFactory> */
    use HasFactory;
    protected $table = 'artikli';
    public $guarded = [];
    public $timestamps = false;

}

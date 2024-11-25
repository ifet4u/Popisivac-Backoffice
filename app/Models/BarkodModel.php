<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarkodModel extends Model
{
    /** @use HasFactory<\Database\Factories\BarkodModelFactory> */
    use HasFactory;
    protected $table = 'barkod';
    protected $fillable = [];
    public $timestamps = false;
}

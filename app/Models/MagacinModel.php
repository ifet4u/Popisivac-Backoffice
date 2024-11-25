<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MagacinModel extends Model
{
    /** @use HasFactory<\Database\Factories\MagacinModelFactory> */
    use HasFactory;
    protected $table = 'magacin';
    public $timestamps = false;
    protected $guarded = [];

}

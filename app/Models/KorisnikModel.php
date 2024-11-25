<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KorisnikModel extends Model
{
    /** @use HasFactory<\Database\Factories\KorisnikModelFactory> */
    use HasFactory;
    protected $table = 'korisnik';
}

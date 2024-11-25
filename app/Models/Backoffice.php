<?php

namespace App\Models;

use App\Http\Controllers\DB;
use Illuminate\Database\Eloquent\Model;

class Backoffice extends Model
{

    public static function artikli()
    {
        $sql = "Select
                Id_Artikal as id,DESCRIPTION as naziv,PRICE as cena,
                MES_TYPE as jm,VAT_CODE as ps,BAR_CODE as barcode
                from Artikli";
        return DB::get($sql);
    }

    public static function barkodovi()
    {
        $sql = "Select id_artikal ,Bar_Code as barcode From Bar_Code";
        return DB::get($sql);
    }
    public static function magacini()
    {
        $sql = "Select id_prodavnica as id,naziv ,broj,adresa,grad From Prodavnice";
        return DB::get($sql);
    }
    public static function podaci()
    {
        $sql = "Select naziv ,adresa,grad,pib,email From Podaci ";
        $row = DB::get($sql);
        return $row[0];
    }


}

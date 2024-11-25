<?php
function preslovi( $tekst ) //Preslovljava YUSCI u YU
{
    $yusci = array( '[', ']', '`', '~', '@', '^', '{', '}', '\\', '|', '\'' );
    $yu = array( 'Š', 'Ć', 'ž', 'č', 'Ž', 'Č', 'š', 'ć', 'Đ', 'đ', ' ' );
    $tex = str_replace( $yusci, $yu, $tekst );
    return $tex;
}

function utf8ize( $mixed ) { //resi problem sa UTF karakterima
    if (is_array($mixed)) {
        foreach ($mixed as $key => $value) {
            $mixed[$key] = utf8ize($value);
        }
    } elseif (is_string($mixed)) {
        return mb_convert_encoding($mixed, "UTF-8", "UTF-8");
    }
    return $mixed;
}

function alert($poruka,$tip = 'success')
{
    session()->flash('poruka',$poruka);
    session()->flash('tip',$tip);
}

function br($num)
{
    $num = round($num, 2);
    $br = number_format($num, 2);
    return $br;
}

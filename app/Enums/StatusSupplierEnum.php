<?php

namespace App\Enums;

Enum StatusSupplierEnum:string{

    case a = "ativo";
    case i = "inativo";

    public static function getValuefromCase($case){

        switch($case){

            case 'a':
                return self::a;

            case "i":
                return self::i;

            default:
                return null;
        }



    }

}
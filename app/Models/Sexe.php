<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sexe extends Model
{
    use HasFactory;

    static public $SEXES = ['Masculin', 'Feminin', 'Autre'];
    static function sexesPluck()
    {
        return collect(self::$SEXES)->mapWithKeys(function ($item) {
            return [$item => $item];
        });
    }
    static public $correspondances = [
        'm' => 'Masculin',
        'f' => 'Feminin',
        "female" => "Feminin",
        "male" => "Masculin",
        "masculin" => "Masculin",
        "feminin" => "Feminin",
        "autre" => "Autre",
        "homme" => "Masculin",
        "femme" => "Feminin",
    ];
    static function  getSexe($input)
    {
        return self::$correspondances[strtolower(trim($input))] ?? 'Autre';
    }
    static function  getSexePossible()
    {
        return array_keys(self::$correspondances);
    }
}

<?php

namespace App\lib;

use DateTime;

class NumerotationConverter
{

    private $codes = [];
    public function __construct()
    {

        $date = new DateTime;
        $this->codes = [
            "doc" => [
                'App\Facture' => 'F',
                'App\FactureAcompte' => 'FA',
                'App\Avoire' => 'A',
                'App\Devis' => 'D'
            ],
            "aa" => substr($date->format("Y"), 2),
            "aaaa" => $date->format("Y"),
            "m" => "4",
            "mm" => "04",
            "j" => "28",
            "jj" => "28",
            "cmp" => "5",
        ];
    }


    public function convert($format, $type, $count)
    {

        $parts = explode('>', $format);

        $newString  = $format;
        foreach ($parts as $part) {

            if ($part != "") {

                $sub = preg_replace('/[^A-Za-z0-9\-]/', '', $part);

                if ($sub == 'cmp') {

                    for ($i = 0; $i < intval($this->codes[$sub]) - 1; $i++) {
                        $newString .= '0';
                    }

                    $newString .= strval($count);
                    $newString = str_replace('<' . $sub . '>', '', $newString);
                } else {
                    $ok = $this->codes[$sub];

                    if ($sub == 'doc') {
                        $ok = $this->codes[$sub][$type];
                    }

                    $newString = str_replace('<' . $sub . '>', $ok, $newString);
                }
            }
        }
        return $newString;
    }
}

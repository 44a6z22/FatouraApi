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
        ];
    }


    public function convert($format, $type, $count, $length)
    {

        $parts = explode('>', $format);

        $newString  = $format;
        foreach ($parts as $part) {

            if ($part != "") {

                $sub = preg_replace('/[^A-Za-z0-9\-]/', '', $part);

                if ($sub == 'cmp') {

                    for ($i = 0; $i < $length - strlen(strval($count)); $i++) {
                        $newString .= '0';
                    }

                    $newString .= strval($count);
                    $newString = str_replace('<' . $sub . '>', '', $newString);
                } else {

                    // get a 2 degits number atleast regardless of the number 01, 02, 10 

                    $ok = (intval($this->codes[$sub] < 10)) ?
                        '0' . $this->codes[$sub] :
                        $this->codes[$sub];

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

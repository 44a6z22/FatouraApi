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
            "m" => $date->format("m"),
            "mm" => $date->format("m"),
            "j" => $date->format("d"),
            "jj" => $date->format("d"),
        ];
    }


    public function convert($format, $type, $count, $length)
    {

        $parts = explode('>', $format);
        // remove  the last element.
        unset($parts[count($parts) - 1]);

        $convertedformat  = $format;

        foreach ($parts as $part) {

            if ($part != "") {

                $sub = preg_replace('/[^a-zA-Z]/', '', $part);

                if ($sub == 'cmp') {

                    for ($i = 0; $i < $length - strlen(strval($count)); $i++) {
                        $convertedformat .= '0';
                    }

                    $convertedformat .= strval($count);
                    $convertedformat = str_replace('<' . $sub . '>', '', $convertedformat);
                } else {

                    $ok = "";
                    if ($this->codes[$sub] != null) {

                        // get a 2 degits number atleast regardless of the number 01, 02, 10 
                        // $ok = (intval($this->codes[$sub] < 10)) ? '0' . $this->codes[$sub] : $this->codes[$sub];

                        $ok = $this->codes[$sub];
                        if ($sub == 'doc') {
                            $ok = $this->codes[$sub][$type];
                        }
                    }

                    $convertedformat = str_replace('<' . $sub . '>', $ok, $convertedformat);
                }
            }
        }
        return $convertedformat;
    }
}

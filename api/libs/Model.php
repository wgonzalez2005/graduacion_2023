<?php
class Model extends Mail
{
    private $urlbase;
    private $pattern;
    public function __construct()
    {
        $this->db      = new Databases();
        $this->urlbase = "../public/";
        $this->pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
    }

    // public function getCodigo($a)
    // {
    //     $key = '';
    //     $max = strlen($this->pattern) - 1;
    //     for ($i = 0; $i < $a; $i++) {
    //         $key .= $this->pattern{mt_rand(0, $max)};
    //     }
    //     return strtoupper($key);
    // }

    public function hash($pass)
    {
        return md5($pass);
    }

    public function ls($texto)
    {
        $textoLimpio = preg_replace('([^A-Za-z0-9])', '', $texto);
        return $textoLimpio;
    }

    public function cs($texto)
    {
        return utf8_encode($texto);
    }

    public function formato_moneda($moneda, $num, $dec)
    {

        return $moneda . " " . number_format($num, $dec);

    }

}

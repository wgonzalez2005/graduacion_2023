<?php
class Model
{
    private $urlbase;
    private $pattern;
    public function __construct()
    {
        $this->db      = new Databases();
        $this->urlbase = "../public/";
        $this->pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
    }


    public function encodeId($id)
    {
        return hash('ripemd160', $id);
    }

}

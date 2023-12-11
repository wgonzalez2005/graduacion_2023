<?php
class View
{
    public function __construct()
    {

    }
    public function render($nombrevista)
    {
        require_once 'Views/' . $nombrevista . ".php";
    }
}

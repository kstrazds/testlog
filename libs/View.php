<?php
namespace libs;

class View
{
    public function __construct(){}

    public function render($viewScript)
    {
        require($viewScript);
    }
}
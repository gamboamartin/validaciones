<?php

use gamboamartin\errores\errores;
use gamboamartin\test\test;


class validacionesTest extends test {
    public errores $errores;
    public function __construct(?string $name = null)
    {
        parent::__construct($name);
        $this->errores = new errores();
    }




}
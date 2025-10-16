<?php
class Coche
{
    private $color;
    private $modelo;
    private $velocidad;

    public function __construct($color, $modelo)
    {
        $this->color = $color;
        $this->modelo = $modelo;
        $this->velocidad = 0;
    }

    public function acelerar()
    {
        $this->velocidad += 10;
    }

    public function frenar()
    {
        if ($this->velocidad >= 10) {
            $this->velocidad -= 10;
        } else {
            $this->velocidad = 0;
        }
    }

    public function getVelocidad()
    {
        return $this->velocidad;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function setVelocidad($velocidad)
    {
        $this->velocidad = $velocidad;
        return $this->velocidad;
    }

    public function setColor($color)
    {
        $this->color = $color;
        return $this->color;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
        return $this->modelo;
    }
}

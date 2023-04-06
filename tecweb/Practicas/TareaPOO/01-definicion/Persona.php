<?php
class Persona {
    public $nombre;
    private $edad;

    public function setNombre ($name) {
        $this->nombre = $name;
    }
    public function setEdad ($year) {
        $this->edad = $year;
    }

    public function mostrar() {
        echo '<p>'.$this->nombre.'</p>';
        echo '<p>'.$this->edad.'</p>';

    }
}
?>
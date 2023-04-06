<?php
class Mascota {
    public $nombre;
    public $edad;
    public $raza;
    public $peso;

    public function setNombre ($name) {
        $this->nombre = $name;
    }
    public function setEdad ($year) {
        $this->edad = $year;
    }
    public function setRaza ($race) {
        $this->raza= $race;
    }
    public function setPeso ($weight) {
        $this->peso = $weight;
    }


    public function mostrar() {
        echo '<p>'.$this->nombre.'</p>';
        echo '<p>'.$this->edad.'</p>';
        echo '<p>'.$this->raza.'</p>';
        echo '<p>'.$this->peso.'</p>';

    }
}
?>
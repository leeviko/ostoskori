<?php
class Tuote {
    private $nimi;
    private $hinta;

    public function __construct($nimi, $hinta) {
        $this->nimi = $nimi;
        $this->hinta = $hinta;
    }

    public function nimi() {
        return $this->nimi;
    }

    public function hinta() {
        return $this->hinta;
    }

}
?>
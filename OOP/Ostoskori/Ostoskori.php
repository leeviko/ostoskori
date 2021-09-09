<?php
class Ostoskori {
    private $tuotteet = array();

    public function lisaa($tuote) {
        $this->tuotteet[] = $tuote;
    }

    public function maara() {
        return count($this->tuotteet);
    }

    public function lista() {
        $nimet = array();
        foreach($this->tuotteet as $tuote) {
            $nimet[] = $tuote->nimi();
        }
        return $nimet;
    }
}
?>
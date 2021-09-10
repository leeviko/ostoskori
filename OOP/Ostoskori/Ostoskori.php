<?php

class Ostoskori {
    private $tuotteet = array();
    
    public function lisaa($tuote) {

        require "./db.php";

        $sql = "INSERT INTO tuotteet VALUES (?, ?, ?)";
        if($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("sss", $param_id, $param_nimi, $param_hinta);

            $param_id = uniqid();
            $param_nimi = $tuote->nimi();
            $param_hinta = $tuote->hinta();

            if($stmt->execute()) {
                $addmsg = "Tuote lisätty";
            }
            $stmt->close();
        }
        $mysqli->close();
    }
    
    public function maara() {
        return count($this->tuotteet);
    }

    public function tuotteet() {
        $tuotteet = array();
        require "./db.php";

        $sql = "SELECT id, nimi, hinta FROM tuotteet";
        if($stmt = $mysqli->prepare($sql)) {
            if($stmt->execute()) {
                $stmt->store_result();

                $stmt->bind_result($id_res, $nimi_res, $hinta_res);
                while($stmt->fetch()) {
                    array_push($tuotteet, array("id" => $id_res, "nimi" => $nimi_res, "hinta" => $hinta_res));
                }
                
            }
            $stmt->close();
        }
        $mysqli->close();

        $this->tuotteet = $tuotteet;
        return $this->tuotteet;
    }

    public function poista($tuote_id) {
        require "./db.php";

        $sql = "DELETE FROM tuotteet WHERE id = ?";
    
        if($stmt = $mysqli->prepare($sql)) {
          $stmt->bind_param("s", $param_id);
    
          $param_id = trim($tuote_id);
    
          if($stmt->execute()) {
            $delmsg = "Poistettu onnistuneesti";
          } 
          $stmt->close();
        } 
        $mysqli->close();
    }
}
?>
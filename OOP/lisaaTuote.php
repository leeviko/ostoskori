<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $tuoteNimi = $_POST["tuote-nimi"];
  $tuoteHinta = $_POST["tuote-hinta"];

  if(isset($tuoteNimi) && isset($tuoteHinta)) {
    $tuote = new Tuote($tuoteNimi, $tuoteHinta);

    $ostoskori->lisaa($tuote);
  }

  if(isset($_POST["poista-tuote"])) {
    $ostoskori->poista($_POST["tuote-id"]);
  }

}

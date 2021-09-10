<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="style.css">
</head>
<?php 

  require "Ostoskori/Tuote.php";
  require "Ostoskori/Ostoskori.php";

  $ostoskori = new Ostoskori();

  require "lisaaTuote.php";

?>  

<body>
  <div class="ostoskori">
    <div class="container">
      <h1>Ostoskori</h1>
      <div class="tuotteet">
        <form class="new-product" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
          <label for="tuote-nimi">Tuotteen nimi</label>
          <input name="tuote-nimi" type="text" />
          <label for="tuote-nimi">Tuotteen hinta (e)</label>
          <input name="tuote-hinta" type="number" />
          <input name="tuote-submit" type="submit" value="Lisää ostoskoriin" />
        </form>
        <p class="ostoskori-maara">Tuotteita yhteensä: <?php echo count($ostoskori->tuotteet()); ?></p>
        <div class="ostoskori-tuotteet">
          <?php
            for($i = 0; $i < count($ostoskori->tuotteet()); $i++ ) {
              echo "<div class='tuote'>";
                echo "<div class='nimi'>" . $ostoskori->tuotteet()[$i]["nimi"] . "</div>";
                echo "<span class='hinta'>" . number_format($ostoskori->tuotteet()[$i]["hinta"], 2) . " €</span>";
                echo "<form class='toiminnot' action=" . htmlspecialchars($_SERVER["PHP_SELF"]) . "  method='POST' >";
                  echo '<input type="text" name="tuote-id" class="tuote-id" value="' . $ostoskori->tuotteet()[$i]["id"] . '" readonly/>';
                  echo "<input type='submit' name='poista-tuote' class='poista-btn' value='Poista'/>";
                echo "</form>";
              echo "</div>";
            }
          ?>
        </div>
    </div>
  </div>
</body>
</html>

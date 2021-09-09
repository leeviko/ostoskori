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
  require_once "Ostoskori/Tuote.php";
  require_once "Ostoskori/Ostoskori.php";

  $ostoskori = new Ostoskori();

  $tuote1 = new Tuote("Vene", 5000);
  $tuote2 = new Tuote("Porkkana", 2.00);
  $tuote3 = new Tuote("Omena", 1.50);

  $ostoskori->lisaa($tuote1);
  $ostoskori->lisaa($tuote2);
  $ostoskori->lisaa($tuote3);
?>  

<body>
  <div class="ostoskori">
    <div class="container">
      <h1>Ostoskori</h1>
      <div class="tuotteet">
        <p class="ostoskori-maara">Tuotteita yhteensä: <?php echo $ostoskori->maara(); ?></p>
        <?php 
          echo "<p>" . implode(", ", $ostoskori->lista()) . "</p>";
        ?>
    </div>
  </div>
</body>
</html>

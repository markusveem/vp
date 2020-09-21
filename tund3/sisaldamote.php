<?php
 require("../../../config.php");
 $database = "if20_markus_ve_1";
  

// kui on idee sisestatud ja nuppu vajutatud, salvestame selle andmebaasi
  if (isset ($_POST["ideasubmit"]) and !empty ($_POST["ideainput"])){
	  $conn = new mysqli ($serverhost, $serverusername, $serverpassword, $database );
	  //valmistan ette SQL käsu
	  $stmt = $conn->prepare("INSERT INTO myidaes (idea) VALUES(?)");
	  echo $conn->error;
	  //seome käsuga päris andmed
	  //i - integer, d - decimal, s - string
	  $stmt->bind_param("s",$_POST["ideainput"]);
	  $stmt->execute();
	  echo $conn->error;
	  $stmt->close();
	  $conn->close();
	}
	
	 
	
	
require("header.php");
?>

<hr>
  <form method="POST">
  <label>sisesta oma pähe tulnud mõte!</label>
  <input type="text" name="ideainput" placeholder="Kirjuta siia mõte!">
  <input type="submit" name="ideasubmit" value="saada mõte ära!">
  </form>
  <hr>
   <p>tagasi koju. <a href="home2.php">ehk avalehele</a>
   <p>tahad naha mis on andmebaasis. <a href="motebaas.php">motebaas</a>
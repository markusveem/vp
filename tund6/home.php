<?php
  require("usesession.php");
  
  require("header.php");
?>
  <img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse bänner">
  <h1><?php echo $_SESSION["userfirstname"] ." " .$_SESSION["userlastname"]; ?></h1>
  <p>See veebileht on loodud õppetöö kaigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
  <p>See konkreetne leht on loodud veebiprogrammeerimise kursusel aasta 2020 sügissemestril <a href="https://www.tlu.ee">Tallinna Ülikooli</a> Digitehnoloogiate instituudis.</p>
  <p><a href="?logout=1">Logi välja</a>!</p>
  <ul>
    <li><a href="sisaldamote.php">Lisa oma mõte</a></li>
	<li><a href="motebaas.php">Loe varasemaid mõtteid</a></li>
	<li><a href="listfilm.php">Loe filmiinfot</a></li>
	<li><a href="addfilms.php">Filmiinfo lisamine</a></li>
	<br>
	<li><a href =" filmseos.php"> uus asi filmide jaoks </a></li>
	<hr>
	<li><a href="userprofile.php">Minu kasutajaprofiil</a></li>
  </ul>


  <hr>
</body>
</html>

<?php
 require ("usesession.php");
 require("../../../config.php");
 require("fnc_filmiseosed.php");
 $database = "if20_markus_ve_1";
 //loen lehele kõik olemas olevad mõtted
 
//$filmhtml = readfilms();
   
$sortby = 0;
$sortorder = 0;
	
require("header.php");
?>
<img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse bänner">
  <h1><?php echo $_SESSION["userfirstname"] ." " .$_SESSION["userlastname"]; ?></h1>
  <p>See veebileht on loodud õppetöö kaigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
  <p>See konkreetne leht on loodud veebiprogrammeerimise kursusel aasta 2020 sügissemestril <a href="https://www.tlu.ee">Tallinna Ülikooli</a> Digitehnoloogiate instituudis.</p>

  
  <ul>
   <li>tagasi koju. <a href="home.php">ehk avalehele</a></li>
   <li> <a href="addfilms.php">tahad veel filme sisestada</a></li>
   </ul>
   <p><a href="?logout=1">Logi välja</a>!</p>
   
   <hr>
   <?php 
   if(isset($_GET["sortby"]) and isset ($_GET["sortby"])){
	   if($_GET["sortby"] >=1 and $_GET["sortby"] <= 4){
		   $sortby = $_GET["sortby"];
	   }
	   if($_GET["sortorder"] == 1 or $_GET["sortorder"] == 2){
		   $sortorder = $_GET["sortorder"];
		   
		   
	   }
   }
   
   echo readpersonsinfilm($sortby, $sortorder); 
   
   
   ?>
   
</body>
</html>   
   
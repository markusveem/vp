<?php
 require("../../../config.php");
 require("../fnc_films.php");
 $database = "if20_markus_ve_1";
 //loen lehele kõik olemas olevad mõtted
 
$filmhtml = readfilms();
   
	
	
require("header.php");
?>


  <?php echo $filmhtml; ?> 
  
  <ul>
   <li>tagasi koju. <a href="home2.php">ehk avalehele</a></li>
   <li> <a href="addfilms.php">tahad veel filme sisestada</a></li>
   </ul>
   
   <hr>
   
   
   
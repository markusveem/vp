<?php
 require("../../../config.php");
 $database = "if20_markus_ve_1";
 //loen lehele kõik olemas olevad mõtted
   $conn = new mysqli ($serverhost, $serverusername, $serverpassword, $database );
   $stmt = $conn->prepare("SELECT idea FROM myidaes");
   echo $conn->error;
   //seome tulemuse muutuja
   $stmt->bind_result($ideafromdb);
   $stmt->execute();
   $ideahtml="";
   while($stmt->fetch()) {
    $ideahtml .= "<p>" . $ideafromdb . "</p>";
	
   }  
   $stmt->close();
   $conn->close();
	
	
require("header.php");
?>


  <?php echo $ideahtml; ?>
  
   <p>tagasi koju. <a href="home2.php">ehk avalehele</a>
   <p> <a href="sisaldamote.php">tahad veel motteid sisestada</a>
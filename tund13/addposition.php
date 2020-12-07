<?php
  require("../../../config.php");
  require("../fnc_personmovies.php");
  require("fnc_common.php");
  require("usesession.php");
  $positionerror= ""; 
  $descriptionerror= "";
  $selectedposition = "";
  
  $position="";
  $description= "";
  $notice = ""; 
  if(isset($_POST["positionsubmit"])){
	  
	  if (!empty($_POST["positioninput"])){
		$position = test_input($_POST["positioninput"]);
	  } else {
		  $positionerror = "Sisesta positsioon!";
	  }
	  
	  if(!empty($_POST["descriptioninput"])){
		  $description = test_input($_POST["descriptioninput"]);
	  } else {
		  $descriptionerror = "Sisestage kirjeldus!";
	  }
	  
	  $selectedposition = ($_POST["positioninput"]);
	  if(empty($positionerror)and empty($descriptionerror)){
		$result = saveposition($selectedposition, $description);
		if($result == "ok"){
			$notice = "Positsioon lisatud!";
			$position="";
			$description= "";
		} else {
			$notice = "Tekkis tehniline tõrge: " .$result;
		} 
	  }
   }
 
 require("header.php");
 ?>
 <img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse bänner">
 <h1>Positsiooni sisestamine</h1>   
 <a href="home.php">Tagasi</a>
 <hr>
 <body>
 <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
 <label for="positioninput">Positsioon:</label><br>
 <input name="positioninput" id="positioninput" type="text" value="<?php echo $position; ?>"><span><?php echo $positionerror; ?></span>
 <br>
 <label for="descriptioninput">Positsiooni kirjeldus:</label>
 <br>
 <textarea rows="10" cols="80" name="descriptioninput" id="descriptioninput" placeholder="Positsiooni lühikirjeldus.."><?php echo $description; ?></textarea><span><?php echo $descriptionerror; ?></span>
 <br>
 <input name="positionsubmit" type="submit" value="Salvesta positsiooni info"><span><?php echo "&nbsp; &nbsp; &nbsp;" .$notice; ?></span>
 </form>
 <p><a href="?logout=1">Logi välja</a>!</p>
 </html>
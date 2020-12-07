<?php
  require("../../../config.php");
  require("../fnc_personmovies.php");
  require("fnc_common.php");
  require("usesession.php");
  $titleerror= ""; 
  $durationerror= null;
  $filmyearerror = null;
  $descriptionerror= "";
  
  $selectedtitle ="";
  $title="";
  $filmyear = null;
  $duration= null;
  $description= "";
  $notice = "";
  if(isset($_POST["moviesubmit"])){
	  
	  if (!empty($_POST["titleinput"])){
		$title = test_input($_POST["titleinput"]);
	  } else {
		  $titleeerror = "Sisesta pealkiri!";
	  }
	  
	  if($_POST["yearinput"] > date("Y") or $_POST["yearinput"] <1895){
	    $filmyearerror .= "Ebareaalne valmimisaasta!";
	  }
	  
	   if(!empty($_POST["yearinput"])){
		  $filmyear = intval($_POST["yearinput"]);
	  } else {
		  $filmyearerror = "Vali valmimisaasta!";
	  }
	  if (!empty($_POST["durationinput"])){
		$duration = intval($_POST["durationinput"]);
	  } else {
		  $durationerror = "Sisesta kestvus!";
	  }
	  
	  if(!empty($_POST["descriptioninput"])){
		  $description = test_input($_POST["descriptioninput"]);
	  } else {
		  $descriptionerror = "Sisestage kirjeldus!";
	  }
	  $selectedtitle = ($_POST["titleinput"]);
	  
	  if(empty($titleerror) and empty($durationerror) and empty($filmyearerror) and empty($descriptionerror)){
		$result = savemovie($selectedtitle, $filmyear,$duration,$description);
		if($result == "ok"){
			$notice = "Film lisatud!";
			$title="";
            $filmyear = null;
			$duration= null;
			$description= "";
		} else {
			$notice = "Tekkis tehniline tõrge: " .$result;
		}
	  }
   }
 
 
 require("header.php");
 ?>
 <img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse bänner">
 <h1>Filmi sisestamine</h1>   
 <a href="home.php">Tagasi</a>
 <hr>
 <body>
 <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
 <label for="titleinput">Pealkiri:</label><br>
 <input name="titleinput" id="titleinput" type="text" value="<?php echo $title; ?>"><span><?php echo $titleerror; ?></span>
 <br>
 <label for="yearinput">Filmi valmimisaasta:</label>
 <br>
 <input type ="number" name="yearinput" id="yearinput" value="<?php echo date("Y");?>"><span><?php echo $filmyearerror; ?></span>
 <br>
 <label for="durationinput">Filmi kestvus minutites:</label>
 <br>
 <input type ="number" name="durationinput" id="durationinput" min="30" max="500"><span><?php echo $durationerror; ?></span>
 <br>
 <label for="descriptioninput">Filmi lühikirjeldus:</label>
 <br>
 <textarea rows="10" cols="80" name="descriptioninput" id="descriptioninput" placeholder="Filmi lühikirjeldus.."><?php echo $description; ?></textarea><span><?php echo $descriptionerror; ?></span>
 <br>
 <input name="moviesubmit" type="submit" value="Salvesta filmi info"><span><?php echo "&nbsp; &nbsp; &nbsp;" .$notice; ?></span>
 </form>
 <p><a href="?logout=1">Logi välja</a>!</p>
 </html>
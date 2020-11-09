 <?php
  require("../fnc_personmovies2.php");
  require("../../../config.php");
  require("fnc_common.php");
  require("usesession.php");
  $monthnameset = ["jaanuar", "veebruar", "märts", "aprill", "mai", "juuni", "juuli", "august", "september", "oktoober", "november", "detsember"];
  $firstname= "";
  $lastname = "";
  $birthday = null;
  $birthmonth = null;
  $birthyear = null;
  $birthdate = null;
  $firstperson = "";
  $lastperson = "";
 
  $firstnameerror = "";
  $lastnameerror = "";
  $birthdayerror = null;
  $birthmontherror = null;
  $birthyearerror = null;
  $birthdateerror = null;
  $notice = "";
  
  if(isset($_POST["submitpersondata"])){
	  
	  if (!empty($_POST["firstnameinput"])){
		$firstname = test_input($_POST["firstnameinput"]);
		//echo $firstname;
	  } else {
		  $firstnameerror = "Sisesta eesnimi!";
	  }
	  
	  if (!empty($_POST["lastnameinput"])){
		$lastname = test_input($_POST["lastnameinput"]);
	  } else {
		  $lastnameerror = "Sisesta perekonnanimi!";
	  }
	  
	  if(!empty($_POST["birthdayinput"])){
		  $birthday = intval($_POST["birthdayinput"]);
	  } else {
		  $birthdayerror = "Vali sünnikuupäev!";
	  }
	  
	  if(!empty($_POST["birthmonthinput"])){
		  $birthmonth = intval($_POST["birthmonthinput"]);
	  } else {
		  $birthmontherror = "Vali sünnikuu!";
	  }
	  
	  if(!empty($_POST["birthyearinput"])){
		  $birthyear = intval($_POST["birthyearinput"]);
	  } else {
		  $birthyearerror = "Vali sünniaasta!";
	  }
	  
	  //kontrollime kuupäeva kehtivust (valiidsust)
	  if(!empty($birthday) and !empty($birthmonth) and !empty($birthyear)){
		  if(checkdate($birthmonth, $birthday, $birthyear)){
			  $tempdate = new DateTime($birthyear ."-" .$birthmonth ."-" .$birthday);
			  $birthdate = $tempdate->format("Y-m-d");
		  } else {
			  $birthdateerror = "Kuupäev ei ole reaalne!";
		  }
	  }
	    $firstperson = ($_POST["firstnameinput"]);
		$lastperson = ($_POST["lastnameinput"]);
	  if(empty($firstnameerror) and empty($lastnameerror)and empty($birthdayerror) and empty($birthmontherror) and empty($birthyearerror) and empty($birthdateerror)){
		$result = saveperson($firstperson,$lastperson,$birthdate);
		//$notice = "Kõik korras!";
		if($result == "ok"){
			$notice = "Isik lisatud!";
			$firstname= "";
			$lastname = "";
			$birthday = null;
			$birthmonth = null;
			$birthyear = null;
			$birthdate = null;
		} else {
			$notice = "Tekkis tehniline tõrge: " .$result;
		}
			
	  }
  }

 require("header.php"); 
?>
<img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse bänner">
  <h1>Tegelase sisestamine</h1>   
  <a href="home.php">Tagasi</a>
  <hr>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <label for="firstnameinput">Eesnimi:</label>
	  <br>
	  <input name="firstnameinput" id="firstnameinput" type="text" value="<?php echo $firstname; ?>"><span><?php echo $firstnameerror; ?></span>
	  <br>
      <label for="lastnameinput">Perekonnanimi:</label><br>
	  <input name="lastnameinput" id="lastnameinput" type="text" value="<?php echo $lastname; ?>"><span><?php echo $lastnameerror; ?></span>
	  <br>
	  <br>
	  <label for="birthdayinput">Sünnipäev: </label>
	  <?php
		echo '<select name="birthdayinput" id="birthdayinput">' ."\n";
		echo "\t \t" .'<option value="" selected disabled>päev</option>' ."\n";
		for ($i = 1; $i < 32; $i ++){
			echo "\t \t" .'<option value="' .$i .'"';
			if ($i == $birthday){
				echo " selected ";
			}
			echo ">" .$i ."</option> \n";
		}
		echo "\t </select> \n";
	  ?>
	  <label for="birthmonthinput">Sünnikuu: </label>
	  <?php
	    echo "\t" .'<select name="birthmonthinput" id="birthmonthinput">' ."\n";
		echo "\t \t" .'<option value="" selected disabled>kuu</option>' ."\n";
		for ($i = 1; $i < 13; $i ++){
			echo "\t \t" .'<option value="' .$i .'"';
			if ($i == $birthmonth){
				echo " selected ";
			}
			echo ">" .$monthnameset[$i - 1] ."</option> \n";
		}
		echo "\t </select> \n";
	  ?>
	  <label for="birthyearinput">Sünniaasta: </label>
	  <?php
	    echo "\t" .'<select name="birthyearinput" id="birthyearinput">' ."\n";
		echo "\t \t" .'<option value="" selected disabled>aasta</option>' ."\n";
		for ($i = date("Y") - 1; $i >= date("Y") - 125; $i --){
			echo "\t \t" .'<option value="' .$i .'"';
			if ($i == $birthyear){
				echo " selected "; 
			}
			echo ">" .$i ."</option> \n";
		}
		echo "\t </select> \n";
	  ?>
	  <br>
	  <span><?php echo $birthdateerror ." " .$birthdayerror ." " .$birthmontherror ." " .$birthyearerror; ?></span>
	  <br>
	  <input name="submitpersondata" type="submit" value="Salvesta info"><span><?php echo "&nbsp; &nbsp; &nbsp;" .$notice; ?></span>
</form>  
</body>
<p><a href="?logout=1">Logi välja</a>!</p>
</html>

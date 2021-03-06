<?php
  require("../../../config.php");
  //require("fnc_user.php");
  //kui klikiti nuppu, siis kontrollime ja salvestame
  require("fnc_common.php");
  require("fnc_user.php");

  $monthnameset = ["jaanuar", "veebruar", "märts", "aprill", "mai", "juuni", "juuli", "august", "september", "oktoober", "november", "detsember"];
  $firstname= "";
  $lastname = "";
  $gender = "";
  $birthday = null;
  $birthmonth = null;
  $birthyear = null;
  $birthdate = null;
  $email = "";

  $firstnameerror = "";
  $lastnameerror = "";
  $gendererror = "";
  $emailerror = "";
  $birthdayerror = null;
  $birthmontherror = null;
  $birthyearerror = null;
  $birthdateerror = null;
  $passworderror = "";
  $confirmpassworderror = "";

  $notice = "";
  
  if(isset($_POST["submituserdata"])){

	  if (!empty($_POST["firstnameinput"])){
		$firstname = $_POST["firstnameinput"];
		$firstname = test_input($_POST["firstnameinput"]);
		//echo $firstname;
	  } else {
		  $firstnameerror = "Palun sisesta eesnimi!";
	  }

	  if (!empty($_POST["lastnameinput"])){
		$lastname = $_POST["lastnameinput"];
		$lastname = test_input($_POST["lastnameinput"]);
	  } else {
		  $lastnameerror = "Palun sisesta perekonnanimi!";
	  }

	  if(isset($_POST["genderinput"])){
		//$gender = intval($_POST["genderinput"]);
		$gender = $_POST["genderinput"];
		$gender = intval($_POST["genderinput"]);
		//$gender = $_POST["genderinput"];
	  } else {
		  $gendererror = "Palun märgi sugu!";
	  }

	  if(!empty($_POST["birthdayinput"])){
		  $birthday = intval($_POST["birthdayinput"]);
	  } else {
		  $birthdayerror = "Palun vali sünnikuupäev!";
	  }

	  if(!empty($_POST["birthmonthinput"])){
		  $birthmonth = intval($_POST["birthmonthinput"]);
	  } else {
		  $birthmontherror = "Palun vali sünnikuu!";
	  }

	  if(!empty($_POST["birthyearinput"])){
		  $birthyear = intval($_POST["birthyearinput"]);
	  } else {
		  $birthyearerror = "Palun vali sünniaasta!";
	  }
	  
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

	  if (!empty($_POST["emailinput"])){
		$email = $_POST["emailinput"];
		$email = test_input($_POST["emailinput"]);
	  } else {
		  $emailerror = "Palun sisesta e-postiaadress!";
	  }
	  
	  if (empty($_POST["passwordinput"])){
		$passworderror = "Palun sisesta salasõna!";
	  } else {
		  if(strlen($_POST["passwordinput"]) < 8){
			  $passworderror = "Liiga lühike salasõna (sisestasite ainult " .strlen($_POST["passwordinput"]) ." märki).";
		  }
	  }
	  
	  if (empty($_POST["confirmpasswordinput"])){
		$confirmpassworderror = "Palun sisestage salasõna kaks korda!";  
	  } else {
		  if($_POST["confirmpasswordinput"] != $_POST["passwordinput"]){
			  $confirmpassworderror = "Sisestatud salasõnad ei olnud ühesugused!";
		  }
	  }
	  
	  
	  // kasutaja kaitse
	  
	  if (!empty($_POST['username']) && !empty($_POST['email'])) {
		  $username = trim(htmlspecialchars($_POST['username']));
		  $email = trim(htmlspecialchars($_POST['email']));
		 

}
	  if (!empty($_POST['email'])) {
		  $email = trim(htmlspecialchars($_POST['email']));
		  $email = filter_var($email, FILTER_VALIDATE_EMAIL);
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  //kasutaja kaitse 2
		  
		class  Input {
	static $errors = true;

	static function check($arr, $on = false) {
		if ($on === false) {
			$on = $_REQUEST;
		}
		foreach ($arr as $value) {	
			if (empty($on[$value])) {
				self::throwError('Data is missing', 900);
			}
		}
	}

	static function int($val) {
		$val = filter_var($val, FILTER_VALIDATE_INT);
		if ($val === false) {
			self::throwError('Invalid Integer', 901);
		}
		return $val;
	}

	static function str($val) {
		if (!is_string($val)) {
			self::throwError('Invalid String', 902);
		}
		$val = trim(htmlspecialchars($val));
		return $val;
	}

	static function bool($val) {
		$val = filter_var($val, FILTER_VALIDATE_BOOLEAN);
		return $val;
	}

	static function email($val) {
		$val = filter_var($val, FILTER_VALIDATE_EMAIL);
		if ($val === false) {
			self::throwError('Invalid Email', 903);
		}
		return $val;
	}

	static function url($val) {
		$val = filter_var($val, FILTER_VALIDATE_URL);
		if ($val === false) {
			self::throwError('Invalid URL', 904);
		}
		return $val;
	}

	static function throwError($error = 'Error In Processing', $errorCode = 0) {
		if (self::$errors === true) {
			throw new Exception($error, $errorCode);
		}
	}
}  
		  

			

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	if ($email === false) {
		exit('Invalid Email');
	}

}
	  
	  

	  if(empty($firstnameerror) and empty($lastnameerror) and empty($gendererror ) and empty($emailerror) and empty($passworderror) and empty($confirmpassworderror)){
		//$notice = signup($firstname, $lastname, $email, $gender, $birthdate, $_POST["passwordinput"]);
		$notice = "Kõik korras!";
	  if(empty($firstnameerror) and empty($lastnameerror) and empty($gendererror) and empty($birthdayerror) and empty($birthmontherror) and empty($birthyearerror) and empty($birthdateerror) and empty($emailerror) and empty($passworderror) and empty($confirmpassworderror)){
		$result = signup($firstname, $lastname, $email, $gender, $birthdate, $_POST["passwordinput"]);
		//$notice = "Kõik korras!";
		if($result == "ok"){
			$notice = "Kõik korras, kasutaja loodud!";
			$firstname= "";
			$lastname = "";
			$gender = "";
			$birthday = null;
			$birthmonth = null;
			$birthyear = null;
			$birthdate = null;
			$email = "";
		} else {
			$notice = "Tekkis tehniline tõrge: " .$result;
		}

		$firstname= "";
	    $lastname = "";
		$gender = "";
		$email = "";
		//echo $firstname ." " .$lastname ." " .$email ." " .$gender ." " .$birthdate ." " .$_POST["passwordinput"]; 		
	  }

  }


  $username = "";

  require("header.php");
?>
  <img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse bänner">
  <h1>Uue kasutajakonto loomine</h1>
  <p>See veebileht on loodud õppetöö käigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
  <p>Leht on loodud veebiprogrammeerimise kursusel <a href="http://www.tlu.ee">Tallinna Ülikooli</a> Digitehnoloogiate instituudis.</p>
    
  <ul>
    <li><a href="home2.php">Avalehele</a></li>
  </ul>
  <hr>
  <form method="POST">
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <label for="firstnameinput">Eesnimi:</label>
	  <br>
	  <input name="firstnameinput" id="firstnameinput" type="text" value="<?php echo $firstname; ?>"><span><?php echo $firstnameerror; ?></span>
	  <br>
	  <br>
      <label for="lastnameinput">Perekonnanimi:</label><br>
	  <input name="lastnameinput" id="lastnameinput" type="text" value="<?php echo $lastname; ?>"><span><?php echo $lastnameerror; ?></span>
	  <br>
	  <br>
	  <input type="radio" name="genderinput" id="genderfemaleinput" value="2" <?php if($gender == "2"){		echo " checked";} ?>><label for="genderfemaleinput">Naine</label>
	  <input type="radio" name="genderinput" id="gendermaleinput" value="1" <?php if($gender == "1"){		echo " checked";} ?>><label for="gendermaleinput">Mees</label>
	  <span><?php echo "&nbsp; &nbsp; &nbsp;" .$gendererror; ?></span>
	  <br>
	  <br>
	  <hr>

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
		for ($i = date("Y") - 15; $i >= date("Y") - 105; $i --){
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
	  <br>
	  <hr>

	  <label for="emailinput">E-mail (kasutajatunnus):</label><br>
	  <input type="email" name="emailinput" id="emailinput" value="<?php echo $email; ?>"><span><?php echo $emailerror; ?></span>
	  <br>
	  <br>
	  <label for="passwordinput">Salasõna (min 8 tähemärki):</label>
	  <br>
	  <input name="passwordinput" id="passwordinput" type="password"><span><?php echo $passworderror; ?></span>
	  <br>
	  <br>
	  <label for="confirmpasswordinput">Korrake salasõna:</label>
	  <br>
	  <input name="confirmpasswordinput" id="confirmpasswordinput" type="password"><span><?php echo $confirmpassworderror; ?></span>
	  <br>
	  <br>
	  <input name="submituserdata" type="submit" value="Loo kasutaja"><span><?php echo "&nbsp; &nbsp; &nbsp;" .$notice; ?></span>
	</form>
  
</body>
</html>
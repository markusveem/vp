<?php

	require("../../../config.php");
	require("fnc_common.php");
	require("fnc_userr.php");
	$username = "";
	$firstname="";
	$lastname="";
	$email="";
	$gender="";
	
	$birthday="";
	$birthmonth="";
	$birthyear="";
	$birthdate="";
	
	$firstnameerror="";
	$lastnameerror="";
	$gendererror="";
	$emailerror="";
	$passworderror="";
	$passwordsecondaryerror ="";
	$login ="";
	
	$birthdayerror="";
	$birthmontherror="";
	$birthyearerror="";
	$birthdateerror="";
	$monthnameset= ["jaanuar", "veebruar", "märts", "aprill", "mai", "juuni", "juuli", "august", "september", "oktoober", "november", "detsember"];
	$notice="";
	

	if(isset($_POST["userdatasubmit"])){
        $firstname = $_POST["firstnameinput"];
        $lastname = $_POST["lastnameinput"];
        $email = $_POST["emailinput"];
        $gender = $_POST["genderinput"];
		
		if(empty($_POST["firstnameinput"])){
            $firstnameerror = "Sisestage eesnimi.";
        }else{
			$firstname = test_input($_POST["firstnameinput"]);
		}
        if(empty($_POST["lastnameinput"])){
            $lastnameerror = "Sisestage perekonnanimi.";
        }else{
			$lastname = test_input ($_POST["lastnameinput"]);
		}
        if(empty($_POST["emailinput"])){
            $emailerror = "Sisestage e-post.";
        }else{
			$email=test_input($_POST["emailinput"]);
		
		}
        if(strlen($_POST["passwordinput"]) < 8){
            $passworderror = "Liiga lühike parool.";
        }
		
		if(empty ($_POST["passwordinput"])){
			$passworderror = "sisesta parool";
		}
		
        if(($_POST["passwordinput"]) !=($_POST["passwordsecondaryinput"])){
            $passwordsecondaryerror = "Paroolid ei kattu.";
        }
        if(empty($_POST["genderinput"])){
            $gendererror = "Sisestage sugu.";
        }else{
			intval ($_POST["genderinput"]);
			
		}
		
		if (!empty($_POST["birthdayinput"])){
			$birthday = intval($_POST["birthdayinput"]);
		}else{
			$birthdayerror = "palun vali sünnikuupäev";
		}
		
		if (!empty($_POST["birthmonthinput"])){
			$birthmonth = intval($_POST["birthmonthinput"]);
		}else{
			$birthmontherror = "palun vali sünnikuu";
		}
		
		if (!empty($_POST["birthyearinput"])){
			$birthday = intval($_POST["birthyearinput"]);
		}else{
			$birthyearerror = "palun vali sünniaasta";
		}
		
		// kontrollime kuupaeva kehtivust 
		
		if(!empty($birthday) and !empty($birthmonth)and !empty($birthyear)){
			
			if(checkdate($birthmonth,$birthday, $birthyear)){
				$tempdate = new DateTime($birthyear ."-" . $birthmonth ."-" .$birthdate);
				$birthdate = $tempdate->format("Y-m-d");
				echo $birthdate;
				
			
			}else{
				$birthdateerror = "kuupäev ei ole reaalne!";
				
				
			}
		}	
			
			
		
		
        if(empty($firstnameerror) and empty($birthdayerror) and empty($birthmontherror) and empty($birthyearerror) and empty($birthdateerror) and empty($lastnameerror) and empty($emailerror) and empty($passworderror) and empty($passwordsecondaryerror) and empty($gendererror)){
			echo $firstname ." " .$lastname . " " .$email ." ".$gender ." " .$birthdate . " " .$birthday ." " .$birthmonth ." " .$birthyear . " " .$email . " " .$_POST["passwordinput"];
			$result = signup($firstname, $lastname, $email, $gender, $birthdate, $_POST["passwordinput"]);
            $login = "sisselogimine onnestus";
			if($result=="ok"){
				$notice = "kõik korras, kasutaja loodud";
				
				$firstname="";
				$lastname="";
				$gender="";
				$email="";
				$login="";
				
				$birthdate="";
				$birthday="";
				$birthmonth="";
				$birthyear="";
				
			}else{
				$notice = "tekkis tehniline tõrge:" .$result;
			}

				
			$notice = signup($firstname, $lastname, $email, $gender, 
			$birthdate,$_POST["passwordinput"]);
        }
		
    }





/*	if(empty($_POST["firstnameinput"])and !empty($_POST ["userdatasubmit"])){
		$firstnameerror = "Eesnimi sisestamata!"	
		
	}
	
	if(empty($_POST["lastnameinput"])and !empty($_POST ["userdatasubmit"])){
		$lastnameerror = "perekonnanimi sisestamata!"	
		
	}
	
	if(empty($_POST["genderinput"])and !empty($_POST ["userdatasubmit"])){
		$gendererror = "sugu sisestamata!"	
		
	}
	
  
 
 if (strlen($_POST["passwordinput"]) <8{
	 $passworderror = "salasona liiga luhike"
 }*/
	
	
	/*
	$firstname="";
	$lastname="";
	$gender="";
	$email="";
	$login="";
	
	$birthdate="";
	$birthday="";
	$birthmonth="";
	$birthyear="";
	*/
	require("header.php");
?>
	
	<img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse logo">
   
  <h1><?php echo $username; ?></h1>
  <p>See veebileht on loodud õppetöö kaigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
  <p>See leht on tehtud veebiprogrammeerimise 2020 aastal. <a href="http://www.tlu.ee">
  Tallinna Ülikooli Digitehnoloogia Instituudis.</a>
  <ul>
  <li>tagasi koju. <a href="home2.php">ehk avalehele</a></li>
  </ul>

  <hr>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <!--<label> eesnimi 
  <input type="TEXT" name="firstnameinput" placeholder="keegi"
  id="firstname" type="text" value="<?php echo $firstname; ?>">
  <span><?php echo $firstnameerror; ?></span> -->
  <label> eesnimi
  <input name="firstnameinput" id="firstname" placeholder="keegi" type="text" value="<?php echo $firstname; ?>">
  <span><?php echo $firstnameerror; ?></span>
  <br>
  <br>
  perekonna nimi
  <input type="text" name="lastnameinput" id="lastname" value="<?php echo $lastname; ?>" placeholder="example">
  <span><?php echo $lastnameerror; ?></span>
  <br>
  <br>
  sugu
  <input type="radio" name="genderinput" id="gendermale" value="1" 
  <?php if ($gender=="1"){echo " checked";}?>><label 
  for="gendermale">Mees</label>
  <span><?php echo $gendererror; ?></span>
  <input type="radio" name="genderinput" id="genderfemale" value="2"
  <?php if ($gender=="2"){echo " checked";}?>><label
  for="genderfemale">Naine</label>
  <span><?php echo $gendererror; ?></span>
  <br>
  <br>
  
  
  
  
  
  
  <label for="birthdayinput">Sünnipäev: </label>
	<?php
			echo '<select name="birthdayinput" id="birthdayinput">' ."\n";
			echo '<option value="" selected disabled>päev</option>' ."\n";
			for ($i = 1; $i < 32; $i ++){
				echo'<option value="' .$i .'"';
				if ($i == $birthday){
					echo " selected ";
				}
				echo ">" .$i ."</option> \n";
			}
			echo "</select> \n";
		  ?>
	  <label for="birthmonthinput">Sünnikuu: </label>
	  <?php
	    echo "\t" .'<select name="birthmonthinput" id="birthmonthinput">' ."\n";
		echo '<option value="" selected disabled>kuu</option>' ."\n";
		for ($i = 1; $i < 13; $i ++){
			echo '<option value="' .$i .'"';
			if ($i == $birthmonth){
				echo " selected ";
			}
			echo ">" .$monthnameset[$i - 1] ."</option> \n";
		}
		echo "</select> \n";
	  ?>
	  <label for="birthyearinput">Sünniaasta: </label>
	  <?php
	    echo '<select name="birthyearinput" id="birthyearinput">' ."\n";
		echo '<option value="" selected disabled>aasta</option>' ."\n";
		for ($i = date("Y") - 15; $i >= date("Y") - 110; $i --){
			echo '<option value="' .$i .'"';
			if ($i == $birthyear){
				echo " selected ";
			}
			echo ">" .$i ."</option> \n";
		}
		echo "</select> \n";
	  ?>
	  <br>
	  <span><?php echo $birthdateerror ." " .$birthdayerror ." " .$birthmontherror ." " .$birthyearerror; ?></span>
	  <br>
	  <br>
  
  
  
  
  
  
  </label>
  <hr>
  <label> kasutajanimi </label>
  <input type="email" id="email" value="<?php echo $email;?>" name="emailinput"
  placeholder="keegi4example@gmail.com">
  <span><?php echo $emailerror; ?></span>
  <br>
  <br>
  
  <label> parool </label>
  <input type="password" id="passwordinput" name="passwordinput" placeholder="**********">
  <span> <?php echo  $passworderror;?></span>
  <br>
  <br>
  parool uuesti
  <input type ="password" id="passwordsecondaryinput" name="passwordsecondaryinput" placeholder="**********">
  <span> <?php echo $passwordsecondaryerror; ?></span>
  
  <input type="submit" name="userdatasubmit" value="loo kasutaja"><span><?php echo "&nbsp; &nbsp; &nbsp;" .$notice; ?></span>
  <p><?php echo $login; ?></p>
  
  
  <ul>
  <li> parool peab olema 8 voi rohkem tahemarki </li>
  </ul>
  <hr>
  <hr>
  </form>
  
<?php  
 /* $firstnamerror="";
  $lastnameinput="";
  $genderinput  ="";
  $emailinput   ="";
  $passwordinput="";
  $passwordsecondaryinput ="";
  */
  /*if(strlen($_POST["passwordinput"])<8){
	    echo "salasona liiga luhike";
  
  }
*/
  
 






?>
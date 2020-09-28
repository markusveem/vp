<?php
	$username = "Markus Veem";
	$firstname="";
	$lastname="";
	$email="";
	$gender="";
	$firstnameerror="";
	$lastnameerror="";
	$gendererror  ="";
	$emailerror   ="";
	$passworderror="";
	$passwordsecondaryerror ="";
	$login ="";
	
	
	//storeinfo---- --------login
	//register submit -----userdatasubmit
	

	if(isset($_POST["userdatasubmit"])){
        $firstname = $_POST["firstnameinput"];
        $lastname = $_POST["lastnameinput"];
        $email = $_POST["emailinput"];
        $gender = $_POST["genderinput"];
		
		if(empty($_POST["firstnameinput"])){
            $firstnameerror = "Sisestage eesnimi.";
        }
        if(empty($_POST["lastnameinput"])){
            $lastnameerror = "Sisestage perekonnanimi.";
        }
        if(empty($_POST["emailinput"])){
            $emailerror = "Sisestage e-post.";
        }
        if(strlen($_POST["passwordinput"]) < 8){
            $passworderror = "Liiga lühike parool.";
        }
        if(($_POST["passwordinput"]) != ($_POST["passwordsecondaryinput"])){
            $passwordsecondaryerror = "Paroolid ei kattu.";
        }
        if(empty($_POST["genderinput"])){
            $gendererror = "Sisestage sugu.";
        }
        if(empty($firstnameerror) and empty($lastnameerror) and empty($emailerror) and empty($passworderror) and empty($passwordsecondaryerror) and empty($gendererror)){
            $login = "sisselogimine onnestus";
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
  <form method="POST">
  <!--<label> eesnimi 
  <input type="TEXT" name="firstnameinput" placeholder="keegi"
  id="firstname" type="text" value="<?php echo $firstname; ?>">
  <span><?php echo $firstnameerror; ?></span> -->
  <label> eesnimi
  <input name="firstnameinput" id="firstname" placeholder="keegi" type="text" value="<?php echo $firstname; ?>">
  <span><?php echo $firstnameerror; ?></span>
  <hr>
  perekonna nimi
  <input type="text" name="lastnameinput" id="lastname" value="<?php echo $lastname; ?>" placeholder="example">
  <span><?php echo $lastnameerror; ?></span>
  <hr>
  sugu
  <input type="radio" name="genderinput" id="gendermale" value="1" 
  <?php if ($gender=="1"){echo " checked";}?>><label 
  for="gendermale">Mees</label>
  <span><?php echo $gendererror; ?></span>
  <input type="radio" name="genderinput" id="genderfemale" value="2"
  <?php if ($gender=="2"){echo " checked";}?>><label
  for="genderfemale">Naine</label>
  <span><?php echo $gendererror; ?></span>
  
  </label>
  <hr>
  <label> kasutajanimi </label>
  <input type="email" id="email" value="<?php echo $email;?>" name="emailinput" placeholder="keegi4example@gmail.com">
  <span><?php echo $emailerror; ?></span>
  <hr>
  
  <label> parool </label>
  <input type="password" id="passwordinput" name="passwordinput" placeholder="**********">
  <span> <?php echo  $passworderror;?></span>
  <hr>
  parool uuesti
  <input type ="password" id="passwordsecondaryinput" name="passwordsecondaryinput" placeholder="**********">
  <span> <?php echo $passwordsecondaryerror; ?></span>
  
  <input type="submit" name="userdatasubmit" value="logi sisse">
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
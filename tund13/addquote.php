<?php
 require ("usesession.php");
 require("../../../config.php");
 require("fnc_common.php");
  
  
  $personnotice = "";
  $selectedperson = "";
  $selectedposition = "";
  $selectedrole = "";
  $selectedpersoninfilm = "";
  $personquotenotice = "";
  $personquote = "";
  $selectedfilm ="";
  
  require("../fnc_personmovies.php");
  
  if(isset($_POST["filmpersonrelationsubmit"])){
	//$selectedfilm = $_POST["filminput"];
	if(!empty($_POST["filminput"])){
		$selectedfilm = intval($_POST["filminput"]);
	} else {
		$personnotice = " Vali film!";
	}
	if(!empty($_POST["personinput"])){
		$selectedperson = intval($_POST["personinput"]);
	} else {
		$personnotice .= " Vali persoon!";
	}
	if(!empty($_POST["positioninput"])){
		$selectedposition = intval($_POST["positioninput"]);
	} else {
		$personnotice .= " Vali positsioon!";
	}
	$selectedrole = ($_POST["roleinput"]);

	if(!empty($selectedfilm) and !empty($selectedperson) and !empty($selectedposition)){
		$personnotice = storenewpersonrelation($selectedperson, $selectedfilm, $selectedposition, $selectedrole);
	}
  }
  
  
  
  if(isset($_POST["personquoterelationsubmit"])){
	if(!empty($_POST["quoteinput"])){
		$personquote = ($_POST["quoteinput"]);
	} else {
		$personquotenotice = " Sisesta tsitaat!";
	}
	if(!empty($_POST["roleinfilminput"])){
		$selectedpersoninfilm = intval($_POST["roleinfilminput"]);
	} else {
		$personquotenotice .= " Vali filmi tegelane!";
	}
	if(!empty($personquote) and !empty($selectedpersoninfilm)){
		$personquotenotice = storenewpersonquoterelation($personquote, $selectedpersoninfilm);
	}
  }
  
 


  require("header.php");
?> 




  <hr>
  <h2>Määrame persoonile filmis quote</h2>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  
	<textarea rows="10" cols="80" name="quoteinput" id="quoteinput" placeholder="Filmitegelase tsitaat!"></textarea>
	<?php
		echo $personinfilmselecthtml;
	?>
	<input type="submit" name="personquoterelationsubmit" value="Salvesta filmi tegelase tsitaat"><span><?php echo $personquotenotice; ?></span><span>
  </form>
  
  <hr>
  <h2>Määrame filmile persoon</h2>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <?php
		echo $filmpersonselecthtml;
		echo $filmselecthtml;
		echo $filmpersonpositionselecthtml;
	?>
    <input type ="text" name="roleinput" placeholder="Roll filmis!">
	<input type="submit" name="filmpersonrelationsubmit" value="Salvesta seos persooniga"><span><?php echo $personnotice; ?></span>
  </form>
<a href="home.php">Tagasi koju</a>
<p><a href="?logout=1">Logi välja</a>!</p>
</body>
</html>
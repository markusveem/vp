<?php
	require("usesession.php");
	require("../../../config.php");
	require("fnc_user.php");
	require("fnc_common.php");
	require ("header.php");
	require ("fnc_filmiseosed.php");
	
	$notice = "";
	$selectedfilm = "";
	$selectedgenre = "";
	if(isset($_POST["filmrelationsubmit"])){

		if(!empty($_POST["filminput"])){
			$selectedfilm = intval($_POST["filminput"]);
		} else {
			$notice = " Vali film!";
		}
		if(!empty($_POST["filmgenreinput"])){
			$selectedgenre = intval($_POST["filmgenreinput"]);
		} else {
			$notice .= " Vali žanr!";
		}
		if(!empty($selectedfilm) and !empty($selectedgenre)){
			$notice = storenewrelation($selectedfilm, $selectedgenre);
		}
	  }

	$filmselecthtml = readmovietoselect($selectedfilm);
	$filmgenreselecthtml = readgenretoselect($selectedgenre);

	require ("header.php");
?>
	<img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse bänner">
	<h1><?php echo $_SESSION["userfirstname"] ." " .$_SESSION["userlastname"]; ?></h1>
	<p>See veebileht on loodud õppetöö käigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
	<p>See konkreetne leht on loodud veebiprogrammeerimise kursusel aasta 2020 sügissemestril <a href="https://www.tlu.ee">Tallinna Ülikooli</a> Digitehnoloogiate Instituudis.</p>
	<hr>
	  <h2>Määrame filmile žanri</h2>
	  <hr>
	  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<?php
			echo $filmselecthtml;
			echo $filmgenreselecthtml;
		?>

		<input type="submit" name="filmrelationsubmit" value="Salvesta filmiinfo"><span><?php echo $notice; ?></span>
	  </form>
	 <hr>
	<li><a href="home.php">Tagasi avalehele</a></li>
	<li><a href="?logout=1">Logi välja</a></li>
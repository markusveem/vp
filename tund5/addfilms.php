<?php
 require("../../../config.php");
 require("../fnc_films.php");
 $database = "if20_markus_ve_1";
 //loen lehele kõik olemas olevad mõtted
 $inputerror = "";
//kui klikiti submit siis..
if(isset($_POST["filmsubmit"])){
		if(empty($_POST["titleinput"]) or empty($_POST["genreinput"]) or empty($_POST["studioinput"]) or empty($_POST["genreinput"])){
			$inputerror .="Osa infot on sisestamata";
		
	}
	if ($_POST["yearinput"] > date("Y") or $_POST["yearinput"] < 1895) {
		$inputerror .="ebarealne valmimisaasta";
	
}
	if (empty($inputerror)){
		savefilm($_POST["titleinput"], $_POST["yearinput"], 
		$_POST["durationinput"], $_POST["genreinput"], $_POST["studioinput"], $_POST["directorinput"]);
}	

	
}
   
	
	
require("header.php");
?>


  
  <ul>
  
   <li>tagasi koju. <a href="home2.php">ehk avalehele</a></li>
   <li> <a href="listfilm.php">tahad naha sisetatud filme</a></li>
  </ul>
  
  <hr>
   
   <form method = "POST">
		<label for="titleinput">filmi pealkiri</label>
		<input rype="text" name="titleinput" id="titleinput" 
		placeholder = "Pealkiri">
		<br>
		<label for="yearinput">filmi valmimisaasta</label>
		<input rype="number" name="yearinput" id="yearinput" value="
		<?php echo date ("Y"); ?>">
		<br>
		<label for="durationinput">filmi kestus</label>
		<input rype="number" name="durationinput" id="durationinput"
		value="80">
		<label for="genreinput">filmi žanr</label>
		<input rype="text" name="genreinput" id="genreinput" 
		placeholder = "žanr">
		<br>
		<label for="studioinput">filmi stuudio</label>
		<input rype="text" name="studioinput" id="studioinput" 
		placeholder = "stuudio">
		<br>
		<label for="directorinput">filmi lavastaja</label>
		<input rype="text" name="directorinput" id="directorinput" 
		placeholder = "lavastaja">
		<br>
		<input type="submit" name="filmsubmit" value="Salvestaa filmi info">
		<br>
   </form>
   <p> <?php echo $inputerror ?> </p>
   
  
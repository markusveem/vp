<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="utf-8">
  <title> veebiprogrammeerimine programmeerib veebi</title>
  <style>
  <?php
  
	echo "body { \n";
	if(isset($_SESSION["userbgcolor"])){
		echo "\t \t background-color: " .$_SESSION["userbgcolor"] ."; \n";
	} else {
		echo "\t \t background-color: #FFFFFF; \n";
		
	}	  
	  if(isset($_SESSION["usertextcolor"])){
		echo "\t \t color: " .$_SESSION["usertextcolor"] ."; \n";
	} else {
		echo "\t \t color: #000000; \n";
	}
	echo "\t } \n";
	?>	
		
	 
  </style>

</head>
<body>
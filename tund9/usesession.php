<?php
	session_start();
	
	//kas on sisselogitud
	if(!isset($_SESSION["userid"])){
		//jõuga sunnitakse siisselogimise lehele
		header("Location:page.php");
		exit();
	
	}
	
	//logime välja
	if(isset($_GET["logout"])){
		//lõpetame sessiooni
		session_destroy;
	
		//jõuga sunnitakse siisselogimise lehele
		header("Location:page.php");
		exit();
	}
	?>
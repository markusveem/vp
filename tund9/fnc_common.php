<?php
	function test_input($data) {
	  //$data filter_var(
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
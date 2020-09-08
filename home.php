<?php
   $username = "Markus Veem" ;
   $fulltimenow = date("d.m.Y H:i:s");
   $hournow = date("H");
   $partofday = "lihtsalt aeg";
   if ($hournow < 6) {
	   $partofday = "uneaeg";
   }//enne 6
   if ($hournow >= 8 and $hournow <= 18) {
	   $partofday = "õppimise aeg";
   }
   
   //vaatame semestri kulgemist
   $semesterstart = new DateTime("2020-8-31");
   $semesterend = new DateTime ("2020-12-13");
   $semesterduration = $semesterstart->diff($semesterend);
   $semesterdurationdays = $semesterduration->format ("%r%a");
   $today = new DateTime ("now");   
?>


<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="utf-8">
  <title><?php echo $username; ?> programmeerib veebi</title>

</head>
<body>
  <h1><?php echo $username; ?></h1>
  <p>See veebileht on loodud õppetöö kaigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
  <p>See leht on tehtud veebiprogrammeerimise 2020 aastal. <a href="http://www.tlu.ee">
  Tallinna Ülikooli Digitehnoloogia Instituudis.</a>
  <p> veel ägedat teksti
  

  <p>lehe avamise hetk:<?php echo $fulltimenow; ?>.</p>
  <p><?php echo "praegu on " .$partofday ."."; ?></p>
</body>
</html>
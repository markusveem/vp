<?php
   $username = "Markus Veem" ;
   $fulltimenow = date("d.m.Y H:i:s");
   $hournow = date("H");
   $daynow = date ("d.m.Y");
   $partofday = "lihtsalt aeg";
   if ($hournow < 7 and $hournow >= 00) {
	   $partofday = "uneaeg";
   }// kesköö kuni 7
   
   if ($hournow >= 22 and $hournow <=23) {
	   $partofday = "säti magama";
   } // 22 kuni 23
   
	if ($hournow >=7 and $hournow <8) {
		$partofday = "hommikused toimingud";
	} // 7 kuni 8 hommikul
  
   if ($hournow >= 8 and $hournow <= 16) {
	   $partofday = "kooli aeg";
   } //peale 8 kuni 16
   
   if ($hournow > 16 and $hournow <22) {
	   $partofday = "kodu aeg";
   }   // 16 kuni 22
   
   
   //vaatame semestri kulgemist
    //$semesterstart = mktime(31,8,2020);
     $semesterstart = new DateTime ("2020-8-31");   
   //$semesterstart = DateTime::createFromFormat('j-M-Y', '15-Aug-2020');
   $semesterend = new DateTime ("2020-12-13");
   $semesterduration = $semesterstart->diff($semesterend);
   $semesterdurationdays = $semesterduration->format ("%r%a");
   $today = new DateTime ("now");
   $now =time(); 
   $semesterpassed = $semesterstart->diff($today)->format("%r%a");
   $semesterpercent = $semesterpassed * 100 / $semesterdurationdays; 
   $datediff = $daynow - $semesterstart->format("%r%a");
      
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
  <p><?php echo "" .$partofday ."."; ?></p>
  <p>semesteri pikkus on:<?php echo $semesterduration->format ("%r%a") ."paeva"; ?>.</p>
  <p><?php echo "semestri alguseset on moodas". round ($datediff) ."paeva";?></p>
  <p><?php echo $daynow ."."; ?></p>
  <p>semstrist on labi:<?php echo round ($semesterpercent)."%"; ?>.</p>
     
</body>
</html>
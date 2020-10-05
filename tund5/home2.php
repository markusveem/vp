<?php
  
   
   $username = "Markus Veem" ;
   $fulltimenow = date("d.m.Y H:i:s");
   $onlytimenow = date ("H:i:s");
   $hournow = date("H");
   $daynow = date ("d.m.Y");
   $day = date ("d");
   $year = date ("Y");
   $partofday = "lihtsalt aeg";
   
   $weekdaynameset = ["esmaspäev", "teisipäev", "kolmapäev", "neljapäev", "reede", "laupäev", "pühapäev"];
   $monthnameset = ["jaanuar", "veebruar", "märts", "aprill", "mai", "juuni", "juuli", "august", "september", "oktoober", "november", "detsember"];
   
   //echo $weekdaynameset;
   //  var_dump ($weekdaynameset);
   $weekdaynow = date ("N");
   $month = date ("n");
   //echo $weekdaynow;
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
   
   
   //annan ette lubatud pildivormingute loendi
   $picfiletypes = ["image/jpeg", "image/png"];
   //loeme piltide kataloogisiseu ja näitame pilte
   //$allfiles = scandir( "../vp_pics/");
   $allfiles = array_slice(scandir ( "../vp_pics/"), 2);
   //var_dump($allfiles);
   
   //$picfiles = array_slice($allfiles, 2);
     $picfiles = [];
    //var_dump($picfiles);
	 foreach ($allfiles as $thing) {
	   $fileinfo = getImagesize("../vp_pics/" .$thing);
       if(in_array($fileinfo["mime"], $picfiletypes) === true)	{
		 } array_push($picfiles, $thing);			 
	 }
	//panememe ühe pildi ekraanile 
	$piccount = count($picfiles);
	$picnum = mt_rand(0, ($piccount - 1));
	// $i = $i+1;
	// $i ++;
	// $i += 2;
	
	$imghtml ="";
	// img src="../vp_pics/failinimi.png" alt="tekst">
	/*for($i = 0; $i < $picnum;$i ++){
		$imghtml .= '<img src="../vp_pics/' .$picfiles[$i] .'"';
		$imghtml .= 'alt="Tallinna Ülikool">';
	}*/	
	$imghtml .= '<img src="../vp_pics/' .$picfiles[mt_rand(0,($piccount -1))] .'"';
	$imghtml .= 'alt="Tallinna Ülikool">';
        require("header.php");   
?>



   <img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse logo">
    
  <h1><?php echo $username; ?></h1>
  <p>See veebileht on loodud õppetöö kaigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
  <p>See leht on tehtud veebiprogrammeerimise 2020 aastal. <a href="http://www.tlu.ee">
  Tallinna Ülikooli Digitehnoloogia Instituudis.</a>
  <p> veel ägedat teksti
    
  
  <p>Lehe avamise hetk:<?php echo $weekdaynameset [$weekdaynow -1].", " .$day ."." .$monthnameset [$month -1]." ". $year.", kell ".$onlytimenow; ?>.</p>
  <p><?php echo "hetkel on " .$partofday ."."; ?></p>
  <p>semesteri pikkus on:<?php echo $semesterduration->format ("%r%a") ."paeva"; ?>.</p>
  <p><?php echo "semestri alguseset on moodas". round ($datediff) ."paeva";?></p>
  <p>semstrist on labi:<?php echo round ($semesterpercent)."%"; ?>.</p>
  <ul>
  <li> logi sisse.<a href="sisselogimine.php">sisselgoimine</a></li>
  <li>tore link. <a href="sisaldamote.php">motete sisaldamiseks</a></li>
  <li>veel uks tore link. <a href="motebaas.php">naed kirjas olevaid motteid</a></li>
  <li>filmi maailm. <a href="listfilm.php">naed huvitavaid filme</a></li>
  <li>filmi maailm. <a href="addfilms.php">lisa huvitavaid filme</a></li>
  <li> esimne leht <a href ="page.php"> ananüümne avaleht</a></li>
  </ul>
  <hr>
  <?php echo $imghtml; ?>
  
     
</body>
</html>
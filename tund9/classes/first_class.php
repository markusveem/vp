<?php
	
	class First{
		//muutujad, klassis omadused(properties)
		private $mybusiness;
		public $everybodysbusiness;
		
		function __construct($limit){
			$this->mybusiness = mt_rand (0, $limit);
			$this->everybodysbusiness = mt_rand (0, 100); 
			echo "arveude korrutis on" .$this->mybusiness * $this->everybodysbusiness;
			$this->tellSecret();
		} // construct lõppeb
		
		function __destruct(){
			echo "nägite hulka mõttetut infot";
		}
		
		//funktsioonid, klassis meetodid(methods)
		private function tellSecret(){
			echo "saldus";
		}
		public function tellMe(){
			echo "salajane arv on" .$this->mybusiness;
		}
	} //class lõppeb

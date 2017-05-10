<?php
	class DbController{
		const DBIP = "localhost";
		const DBNAME = "project-sierra";
		const DBUSER ="sierra";
		const DBPW = "sierra";
		private $dbconn;

		function __construct(){
			$this->dbconn = new msqli(Self::DBIP,Self::DBNAME,Self::DBUSER,Self::DBPW);
		}

		public function getDbconn(){
		return $this->dbconn;
		}

	}
?>
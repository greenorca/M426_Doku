<?php
	class DbController{
		const DBIP = "localhost";
		const DBNAME = "project-sierra";
		const DBUSER ="sierra";
		const DBPW = "sierra";
		private $dbconn;

		function __construct(){
			$this->dbconn = new mysqli(Self::DBIP,Self::DBNAME,Self::DBUSER,Self::DBPW);
			if ($this->dbconn->connect_error) {
    			die("Database connection failed");
			}
		}

		public function getDbconn(){
			return $this->dbconn;
		}
	}
?>
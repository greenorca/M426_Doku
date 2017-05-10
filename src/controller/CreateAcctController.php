<?php
	define('CRYPT_BLOWFISH',1);
	//User-Id = $_SESSION['userID']
	require_once "DbController.php";

	class CreateAcctController {
		private $username;
		private $password;
		private $dbconn; // Used later for db connetion
		const BLOWFISH_PRE = '$2a$14$'; // This string tells crypt to use blowfish for 14 rounds.
		const BLOWFISH_END = '$'; // This character signalizes the end of a salt
		//const BLOWFISH_ALLOWED_CHARS = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789./"; // Allowed characters for salt when using blowfish
		const SALT_LENGTH = 21; // Length of the salt

		/**
		* Default constructor
		*/
		function __construct(){
			$this->dbconn = new DbController();
		}

		/**
		* This function is used to generate a salt for the password
		* @return -> blowfish salt in form of a string
		*/
		function generateSalt(){
			$blowfishAllowedChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789./";
			$salt = "";
			for($i = 0; $i <= Self::SALT_LENGTH; $i++){
			    $salt .= $blowfishAllowedChars[rand(0,63)];
			}
			return Self::BLOWFISH_PRE . $salt . ¨Self::BLOWFISH_END;
		}

		/**
		* This function is used to get the group names out of the db
		* @return -> group names in form of an array
		*/
		function retreiveGroups(){
			$groupNames = [];
			$stmt = $this->dbconn->prepare("SELECT * FROM `Groups`");
			while($row = $stmt->fetch_object()){
				array_push($groupNames, $row->idGroups);
			}
			$stmt->close();

			return $groupNames;
		}

		/**
		* Getter function for the username
		*/
		public function getUsername(){
			return $this->username;
		}

		/**
		* Setter function for the username
		* @param $username -> The username submitted in form of a string
		*/
		public function setUsername($username){
			$this->username = $username;
		}

		/**
		* Getter function for the password (uncrypted)
		*/
		public function getPassword(){
			return $this->password;
		}

		/**
		* Setter function for the password
		* @param $password -> The password submitted in form of a raw string
		*/
		public function setPassword($password){
			$this->password = $password;
		}
	}
?>
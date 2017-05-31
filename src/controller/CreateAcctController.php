<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
	//User-Id = $_SESSION['userID']
	require_once "DbController.php";

	/**
	* This class is used to create accounts
	* @author Ezra Rieben, Sascha Jaeger
	* @version 1.0.0
	*/
	class CreateAcctController {
		private $name;
		private $firstname;
		private $email;
		private $password;
		private $group;

		private $dbconn; // Used later for db connetion
		const BLOWFISH_PRE = '$2a$14$'; // This string tells crypt to use blowfish for 14 rounds.
		const BLOWFISH_END = '$'; // This character signalizes the end of a salt
		//const BLOWFISH_ALLOWED_CHARS = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789./"; // Allowed characters for salt when using blowfish
		const SALT_LENGTH = 21; // Length of the salt

		/**
		* Default constructor
		*/
		function __construct(){
			$dbController = new DbController();
			$this->dbconn = $dbController->getDbconn();
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
			return Self::BLOWFISH_PRE . $salt . Self::BLOWFISH_END;
		}

		/**
		* This function is used to get the group names out of the db
		* @return -> group names in form of an array
		*/
		function retreiveGroups(){
			$groupNames = [];
			$stmt = $this->dbconn->prepare("SELECT * FROM `Groups`");
			$stmt->execute();
      $result = $stmt->get_result();
      while($row = $result->fetch_assoc()){
				array_push($groupNames, $row['Groupname']);
			}
			$stmt->close();

			return $groupNames;
		}

		private function saveUser(){
			if(isset($dbconn) && isset($name) && isset($firstname) && isset($email) && isset($password) && isset($group)){
				echo $this->password;
				echo $this->getGroupId($this->group);
				$stmt = $this->dbconn->prepare("INSERT INTO `User` (`name`,`firstname`,`password`,`email`,`is_admin`,`fk_id_group`) VALUES (?,?,?,?,?,?)");
				$stmt->bind_param('ssssii',$this->name,$this->firstname,$this->password,$this->email,0,$this->getGroupId($this->group));
				$stmt->execute();
				$stmt->close();

				return true;
			} else {
				return false;
			}
		}

		/**
		* This function is used to strip html tags and contents
		* @param $stringToClean -> String to remove tags from
		*/
		private function stripHtmlTags($stringToClean){
	    $regexToRemoveTagsAndContent = '/<[^>]*>[^<]*<[^>]*>/';
	    return strip_tags(preg_replace($regexToRemoveTagsAndContent, '', $stringToClean));
		}

		/**
		* Getter function that gets group ID by groupName
		* @param $groupName -> Group name in form of a string
		* @return -> The group ID in form of an integer
		*/
		private function getGroupId($groupName){
			$stmt = $this->dbconn->prepare("SELECT `idGroups` FROM `Groups` WHERE `Groupname`=?");
			$stmt->bind_param('s',$groupName);
			$stmt->bind_result($groupId);
			$stmt->execute();
			$stmt->close();

			return $groupId;
		}
		/**
		* Getter function for the username
		*/
		public function getName(){
			return $this->name;
		}

		/**
		* Setter function for the username
		* @param $username -> The username submitted in form of a string
		*/
		public function setName($name){
			$this->name = $name;
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

		/**
		* Getter function for the email
		*/
		public function getEmail(){
			return $this->email;
		}

		/**
		* Setter function for the email
		* @param $email -> The email submitted in form of a raw string
		*/
		public function setEmail($email){
			$this->email = $email;
		}

		/**
		* Getter function for the group
		*/
		public function getGroup(){
			return $this->group;
		}

		/**
		* Setter function for the group
		* @param $group -> The group name submitted in form of a string
		*/
		public function setGroup($group){
			$this->group = $group;
		}
	}
?>

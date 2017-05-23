<?php
    // Controller imports
    require_once "DbController.php";
    // Model Imports
    require_once "model/User.php";

    /**
    * This class is used to create accounts
    * @author Ezra Rieben, Sascha Jaeger
    * @version 1.0.0
    */
    class CreateAcctController
    {
        private $dbconn; // Used later for db connetion
        const BLOWFISH_PRE = '$2a$14$'; // This string tells crypt to use blowfish for 14 rounds.
        const BLOWFISH_END = '$'; // This character signalizes the end of a salt
        //const BLOWFISH_ALLOWED_CHARS = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789./"; // Allowed characters for salt when using blowfish
        const SALT_LENGTH = 21; // Length of the salt

        /**
        * Default constructor
        */
        public function __construct()
        {
            $dbController = new DbController();
            $this->dbconn = $dbController->getDbconn();
        }

        /**
        * This function is used to generate a salt for the password
        * @return -> blowfish salt in form of a string
        */
        public function generateSalt()
        {
            $blowfishAllowedChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789./";
            $salt = "";
            for ($i = 0; $i <= Self::SALT_LENGTH; $i++) {
                $salt .= $blowfishAllowedChars[rand(0, 63)];
            }
            return Self::BLOWFISH_PRE . $salt . Self::BLOWFISH_END;
        }

        /**
        * This function is used to get the group names out of the db
        * @return -> group names in form of an array
        */
        public function retreiveGroups()
        {
            $groupNames = [];
            $stmt = $this->dbconn->prepare("SELECT * FROM `group`");
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                array_push($groupNames, $row['group_name']);
            }
            $stmt->close();

            return $groupNames;
        }

        /**
        * This function is used to strip html tags and contents
        * @param $stringToClean -> String to remove tags from
        */
        public function stripHtmlTags($stringToClean)
        {
            $regexToRemoveTagsAndContent = '/<[^>]*>[^<]*<[^>]*>/';
            return strip_tags(preg_replace($regexToRemoveTagsAndContent, '', $stringToClean));
        }

        /**
        * Getter function that gets group ID by groupName
        * @param $groupName -> Group name in form of a string
        * @return -> The group ID in form of an integer
        */
        private function getGroupIdByName($groupName)
        {
            $stmt = $this->dbconn->prepare("SELECT `group_id` FROM `group` WHERE `group_name`=?");
            $stmt->bind_param('s', $groupName);
            $stmt->execute();
            $stmt->bind_result($groupId);
            while ($stmt->fetch()) {
                return $groupId;
                $stmt->close();
            }
        }

        /**
        * This function is used to create a new user object and then save it to the DB
        * @param $lastName -> Last name of the user in form of a string
      * @param $firstName -> First name of the user in form of a string
      * @param $email -> Email of the user in form of a string
      * @param $password -> Password of the user in form of a blowfish crypted string
      * @param $groupName -> The name of the user's group in form of a string
        */
        public function createUser($lastName, $firstName, $email, $password, $isAdmin, $groupName)
        {
            if (isset($this->dbconn) && isset($lastName) && isset($firstName) && isset($email) && isset($password) && isset($groupName)) {
                $groupId = $this->getGroupIdByName($groupName);
                $newUser = new User($lastName, $firstName, $email, $password, $isAdmin, $groupId);
                $newUserLastName =$newUser->getLastName();
                $newUserFirstName =$newUser->getFirstName();
                $newUserPassword =$newUser->getPassword();
                $newUserEmail =$newUser->getEmail();
                $newUserIsAdmin =$newUser->isAdmin();
                $newUserGroupId =$newUser->getGroupId();

                $stmt = $this->dbconn->prepare("INSERT INTO `user` (`last_name`,`first_name`,`password`,`email`,`is_admin`,`fk_group_id`) VALUES (?,?,?,?,?,?)");
                $stmt->bind_param('ssssii', $newUserLastName, $newUserFirstName, $newUserPassword, $newUserEmail, $newUserIsAdmin, $newUserGroupId);
                $stmt->execute();
                $stmt->close();


                return true;
            } else {
                return false;
            }
        }
    }

<?php
// Controller imports
require_once "DbController.php";
// Model Imports
require_once "model/User.php";
class LoginController
{
    private $email;
    private $password;
    private $dbconn;

    /**
    * Default constructor
    */
    public function __construct()
    {
        $dbController = new DbController();
        $this->dbconn = $dbController->getDbconn();
    }

    /**
    * This function is used to log a user in
    * (Sets the session variables etc if the user's info is correct)
    * @return -> Returns true if the user is verified else returns false
    */
    public function checkUserLogin()
    {
        if (isset($this->email) && isset($this->password)) {
            $stmt = $this->dbconn->prepare("SELECT * FROM `user` WHERE `email`=?");
            $stmt->bind_param('s', $this->email);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $userId = $row['user_id'];
                $userLastName = $row['last_name'];
                $userFirstName = $row['first_name'];
                $userEmail = $row['email'];
                $userCryptedPassword = $row['password'];
                $userIsAdmin = $row['is_admin'];
                $userGroupId = $row['fk_group_id'];
            }
            if ($result != null) {
                $user = new User($userLastName, $userFirstName, $userEmail, $userCryptedPassword, $userIsAdmin, $userGroupId);
                if (crypt($this->password, $user->getPassword()) == $user->getPassword()) {
                    session_start();
                    $_SESSION['userId'] = $userId;
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
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
    * Getter function for the email
    * @return -> Returns the user's email in form of a string
    */
    public function getEmail()
    {
        return $this->email;
    }

    /**
    * Setter function for the email
    * @param $email -> Email in form of a string
    */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
    * Getter function for the password
    * @return -> Returns the password in form of a normal string
    * NOTE: PASSWORD IS NOT ENCRYPTED
    */
    public function getPassword()
    {
        return $this->password;
    }

    /**
    * Setter function for the username
    * @param $password -> Password in form of a normal string
    * NOTE: PASSWORD NOT TO BE ENCRYPTED
    */
    public function setPassword($password)
    {
        $this->password = $password;
    }
}

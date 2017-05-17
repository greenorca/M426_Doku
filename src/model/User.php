<?php
class User {
  private $name;
  private $firstname;
  private $email;
  private $password;
  private $isAdmin;
  private $groupId;

  private $dbconn;
  /**
  * This is the default constructor for a User object
  * @param $name -> Lastname of the user in form of a string
  * @param $firstname -> Firstname of the user in form of a string
  * @param $email -> Email of the user in form of a string
  * @param $password -> Password of the user in form of a blowfish crypted string
  * @param $isAdmin -> Admin status in form of a boolean
  * @param $groupId -> The ID of the user's group in form of an integer
  */
  function __construct($name, $firstname, $email, $password, $isAdmin, $groupId){
    $this->name = $name;
    $this->firstname = $firstname;
    $this->email = $email;
    $this->password = $password;
    $this->isAdmin = $isAdmin;
    $this->groupId = $groupId;
  }

  /**
  * Getter function for the lastname
  */
  public function getName(){
    return $this->name;
  }

  /**
  * Setter function for the lastname
  * @param $name -> The lastname submitted in form of a string
  */
  public function setName($name){
    $this->name = $name;
  }

  /**
  * Getter function for the firstname
  */
  public function getFirstname(){
    return $this->firstname;
  }

  /**
  * Setter function for the firstname
  * @param $firstname -> The firstname submitted in form of a string
  */
  public function setFirstname($firstname){
    $this->firstname = $firstname;
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
  * Getter function for the admin status
  */
  public function isAdmin(){
    return $this->isAdmin;
  }

  /**
  * Setter function for the admin status
  * @param $isAdmin -> Admin status submitted in form of a boolean
  */
  public function setAdmin($isAdmin){
    $this->isAdmin = $isAdmin;
  }

  /**
  * Getter function for the user's group id
  */
  public function getGroupId(){
    return $this->groupId;
  }

  /**
  * Setter function for the user's group id
  * @param $groupId -> The user's group id in form of an integer
  */
  public function setGroupId($groupId){
    $this->groupId = $groupId;
  }
}
?>

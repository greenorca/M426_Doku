<?php
class User
{
    private $lastName;
    private $firstName;
    private $email;
    private $password;
    private $isAdmin;
    private $groupId;

    private $dbconn;
  /**
  * This is the default constructor for a User object
  * @param $lastName -> Last name of the user in form of a string
  * @param $firstName -> First name of the user in form of a string
  * @param $email -> Email of the user in form of a string
  * @param $password -> Password of the user in form of a blowfish crypted string
  * @param $isAdmin -> Admin status in form of a boolean
  * @param $groupId -> The ID of the user's group in form of an integer
  */
  public function __construct($lastName, $firstName, $email, $password, $isAdmin, $groupId)
  {
      $this->lastName = $lastName;
      $this->firstName = $firstName;
      $this->email = $email;
      $this->password = $password;
      $this->isAdmin = $isAdmin;
      $this->groupId = $groupId;
  }

  /**
  * Getter function for the last name
  */
  public function getLastName()
  {
      return $this->lastName;
  }

  /**
  * Setter function for the last name
  * @param $lastName -> The last name submitted in form of a string
  */
  public function setLastName($lastName)
  {
      $this->lastName = $lastName;
  }

  /**
  * Getter function for the first name
  */
  public function getFirstName()
  {
      return $this->firstName;
  }

  /**
  * Setter function for the first name
  * @param $firstName -> The first name submitted in form of a string
  */
  public function setFirstName($firstName)
  {
      $this->firstname = $firstName;
  }

  /**
  * Getter function for the password (uncrypted)
  */
  public function getPassword()
  {
      return $this->password;
  }

  /**
  * Setter function for the password
  * @param $password -> The password submitted in form of a raw string
  */
  public function setPassword($password)
  {
      $this->password = $password;
  }

  /**
  * Getter function for the email
  */
  public function getEmail()
  {
      return $this->email;
  }

  /**
  * Setter function for the email
  * @param $email -> The email submitted in form of a raw string
  */
  public function setEmail($email)
  {
      $this->email = $email;
  }

  /**
  * Getter function for the admin status
  */
  public function isAdmin()
  {
      return $this->isAdmin;
  }

  /**
  * Setter function for the admin status
  * @param $isAdmin -> Admin status submitted in form of a boolean
  */
  public function setAdmin($isAdmin)
  {
      $this->isAdmin = $isAdmin;
  }

  /**
  * Getter function for the user's group id
  */
  public function getGroupId()
  {
      return $this->groupId;
  }

  /**
  * Setter function for the user's group id
  * @param $groupId -> The user's group id in form of an integer
  */
  public function setGroupId($groupId)
  {
      $this->groupId = $groupId;
  }
}

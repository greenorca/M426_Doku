<?php

require_once 'DbController.php';

/**
 * Class NotenController
 * This class serves the businesslogic for the marks
 */
class NotenController
{
    private $userid;
    private $cnx;
    private $resultArray = [];

    /**
     * NotenController constructor.
     * Sets the classvariable userid and cnx.
     */
    function __construct()
    {
        $this->cnx = new DbController();
    }

    /**
     * Sets the classvariable if the sessionvar userid is set and an integer
     */
    function setUserid()
    {
        if (isset($_SESSION['userid']) && is_int($_SESSION['userid'])) {
            $this->userid = $_SESSION['userid'];
        }
    }

    /**
     * This function will fetch all Marks for the current user.
     */
    function getMarks()
    {
        $stmnt = $this->cnx->prepare('SELECT ');
    }

}
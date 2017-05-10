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
     * @param $userid
     * Sets the classvariable userid and cnx.
     */
    function __construct($userid)
    {
        $this->userid = $userid;
        $this->cnx = new DbController();
    }

    /**
     * This function will fetch all Marks for the current user.
     */
    function getMarks(){

    }

}
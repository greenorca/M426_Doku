<?php

require_once './controller/DbController.php';
require_once './model/Modul.php';

/**
 * Class NotenController
 * This class serves the businesslogic for the marks
 */
class NotenController
{
    private $userid;
    private $cnx;
    private $markArray = [];
    private $modulArray = [];

    /**
     * NotenController constructor.
     * Sets the classvariable userid and cnx.
     */
    function __construct()
    {
        $dbcontroller = new DbController();
        $this->cnx = $dbcontroller->getDbconn();
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
        $stmnt = $this->cnx->prepare('SELECT * FROM Modul');
        $stmnt->execute();
        while ($obj = $stmnt->fetch_object()) {
            array_push($this->modulArray, new Modul($obj->idModul, $obj->modulname, $obj->modulnummer));
        }
        return $this->modulArray;
    }

}
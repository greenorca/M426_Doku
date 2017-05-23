<?php

require_once './controller/DbController.php';
require_once './model/Note.php';


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * Class NotenController
 * This class serves the businesslogic for the marks
 */
class NotenController
{
    private $userid;
    private $cnx;
    private $modulNumber = [];
    private $markArray = [];

    /**
     * NotenController constructor.
     * Sets the classvariable userid and cnx.
     */
    function __construct()
    {
        $dbcontroller = new DbController();
        $this->cnx = $dbcontroller->getDbconn();
        $this->setUserid();
    }

    /**
     * Sets the classvariable if the sessionvar userid is set and an integer
     */
    function setUserid()
    {
        if (isset($_SESSION['userid']) && is_int($_SESSION['userid'])) {
            $this->userid = $_SESSION['userid'];
        }else{
            //Manual allocation for debugging.
            $this->userid = 2;
        }
    }

    /**
     * This function will fetch all Marks for the current user.
     */
    function getMarks()
    {
        $stmnt = $this->cnx->prepare('SELECT * FROM User_Modul WHERE fk_id_user = ?');
        $stmnt->bind_param("s", $this->userid);
        $stmnt->execute();
        $result = $stmnt->get_result();
        while ($obj = $result->fetch_object()) {
            array_push($this->markArray, new Note($obj->lb, $obj->percentage_lb, 'LB', $obj->fk_id_modul));
            array_push($this->markArray, new Note($obj->zp1, $obj->percentage_zp1, 'ZP1', $obj->fk_id_modul));
            array_push($this->markArray, new Note($obj->zp2, $obj->percentage_zp2, 'ZP2', $obj->fk_id_modul));
            array_push($this->markArray, new Note($obj->mj, $obj->percentage_mj, 'MJ', $obj->fk_id_modul));
        }
        return $this->markArray;

    }

}
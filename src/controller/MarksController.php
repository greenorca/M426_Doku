<?php
require_once './controller/DbController.php';
require_once './model/Mark.php';
require_once './model/Modul.php';

/**
 * Class MarksController
 * This class serves the businesslogic for the marks
 */
class MarksController
{
    private $userId;
    private $cnx;
    private $markArray = [];

    /**
     * MarksController constructor.
     * Sets the classvariable userId and cnx.
     */
    public function __construct()
    {
        $dbcontroller = new DbController();
        $this->cnx = $dbcontroller->getDbconn();
        $this->setUserId();
    }

    /**
     * Sets the classvariable if the sessionvar userId is set and an integer
     */
    public function setUserId()
    {
        if (isset($_SESSION['userId']) && is_int($_SESSION['userId'])) {
            $this->userId = $_SESSION['userId'];
        } else {
            //Manual allocation for debugging.
            //$this->userId = 2;
        }
    }

    /**
     * This function will fetch all Marks for the current user.
     */
    public function getMarks()
    {
        $stmnt = $this->cnx->prepare('SELECT * FROM user_modul WHERE fk_user_id = ?');
        $stmnt->bind_param("s", $this->userId);
        $stmnt->execute();
        $result = $stmnt->get_result();
        while ($obj = $result->fetch_object()) {
            array_push($this->markArray, new Mark($obj->lb, $obj->percentage_lb, 'LB', $obj->fk_modul_id));
            array_push($this->markArray, new Mark($obj->zp1, $obj->percentage_zp1, 'ZP1', $obj->fk_modul_id));
            array_push($this->markArray, new Mark($obj->zp2, $obj->percentage_zp2, 'ZP2', $obj->fk_modul_id));
            array_push($this->markArray, new Mark($obj->mj, $obj->percentage_mj, 'MJ', $obj->fk_modul_id));
        }
        return $this->markArray;
    }

    public function getModulDetails($fk_id_modul)
    {
        $stmnt = $this->cnx->prepare('SELECT * FROM modul WHERE modul_id = ?');
        $stmnt->bind_param("s", $fk_id_modul);
        $stmnt->execute();
        $result = $stmnt->get_result();
        while ($obj = $result->fetch_object()) {
            return new Modul($obj->modul_id, $obj->modul_name, $obj->modul_number);
        }
    }
}

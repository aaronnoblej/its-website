<?php

class workorder {

    //------------------------------------------------------
    // INSTANCE VARIABLES
    //------------------------------------------------------

    protected $userId = 0;
    public function getUserId() {return $userId;}
    public function setUserId($val) {$this->userId = $val;}

    protected $category = "";
    public function getCategory() {return $category;}
    public function setCategory($val) {$this->category = $val;}

    protected $summary = "";
    public function getSummary() {return $summary;}
    public function setSummary($val) {$this->summary = $val;}

    protected $dateSubmitted = "";
    public function getDateSubmitted() {return $dateSubmitted;}
    public function setDateSubmitted($val) {$this->dateSubmitted = $val;}

    protected $status = "Open";
    public function getStatus() {return $status;}
    public function setStatus($val) {$this->status = $val;}

    protected $currentId = 0;
    public function getCurrentId() {return $this->currentId;}
    public function setCurrentId($val) {$this->currentId = $val;}

    private $result = NULL;
    private $numRows = 0;

    //------------------------------------------------------
    // CONSTRUCTORS
    //------------------------------------------------------

    function __construct() {
        if(func_num_args() === 3) {
            call_user_func_array(array($this, 'create'), func_get_args());
        }
        if(func_num_args() === 4) {
            call_user_func_array(array($this, 'manualCreate'), func_get_args());
        }
    }

    //------------------------------------------------------
    // METHODS
    //------------------------------------------------------

    function create($userId, $category, $summary) {
        $this->setUserId($userId);
        $this->setCategory($category);
        $this->setSummary($summary);
    }

    function manualCreate($userId, $category, $summary, $status) {
        $this->setUserId($userId);
        $this->setCategory($category);
        $this->setSummary($summary);
        $this->setStatus($status);
    }

    function send() {
        require_once('database.php');
        $db = new database();
        try {
            $db->connect();
            $sql = 'INSERT INTO WorkOrder (UserId, IssueCatagory, IssueSummary, DateSubmitted, Status) VALUES (:userId, :category, :summary, CURRENT_TIMESTAMP, \'Open\')';
            $ps = $db->getConnection()->prepare($sql);
            //Bind Params
            $param_userid = $this->userId;
            $param_category = $this->category;
            $param_summary = $this->summary;
            $ps->bindParam(':userId', $param_userid);
            $ps->bindParam(':category', $param_category);
            $ps->bindParam(':summary', $param_summary);
            if($ps->execute()) {
                $this->setCurrentId($db->getConnection()->lastInsertId());
                $subjectLine = 'New Work Order Submitted!';
                $message = "Submitted by " . $_SESSION["FirstName"] . " " . $_SESSION["LastName"] . "\nIssue Category: " . $this->category . "\n\n" . $this->summary . "\n\nNew Work Orders can be found at http://its.ajnoble.com/mockup/admin/active_wo.php";
                mail('its@ajnoble.com', $subjectLine, $message);
                return true;
            } else {
                echo "ERROR --- " . $ps->errorInfo()[2];
                return false;
            }
        } catch(PDOException $e) {
            echo "DATABASE ERROR --- " . $e->getMessage();
        }

        $db->disconnect();
        return false;
    }

    function manuallyAdd() {
        require_once('database.php');
        $db = new database();
        try {
            $db->connect();
            $sql = 'INSERT INTO WorkOrder (UserId, IssueCatagory, IssueSummary, DateSubmitted, Status) VALUES (:userId, :category, :summary, CURRENT_TIMESTAMP, :status)';
            $ps = $db->getConnection()->prepare($sql);
            //Bind Params
            $param_userid = $this->userId;
            $param_category = $this->category;
            $param_summary = $this->summary;
            $param_status = $this->status;
            $ps->bindParam(':userId', $param_userid);
            $ps->bindParam(':category', $param_category);
            $ps->bindParam(':summary', $param_summary);
            $ps->bindParam(':status', $param_status);
            if($ps->execute()) {
                $this->setCurrentId($db->getConnection()->lastInsertId());
                return true;
            } else {
                echo "ERROR --- " . $ps->errorInfo()[2];
                return false;
            }
        } catch(PDOException $e) {
            echo "DATABASE ERROR --- " . $e->getMessage();
        }

        $db->disconnect();
        return false;
    }

}

?>
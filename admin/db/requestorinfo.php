<?php

class requestorInfo {

    //------------------------------------------------------
    // INSTANCE VARIABLES
    //------------------------------------------------------

    private $workOrder = 0;
    private $email = NULL;
    private $requestor_type = NULL;
    private $phone_number = NULL;
    private $office_extension = NULL;
    private $preferred_contact = NULL;
    private $issue_location = NULL;
    private $computer_no = NULL;
    private $issue_duration = NULL;
    private $phone_software = NULL;
    private $computer_software = NULL;
    private $last_restart = NULL;
    private $ip_address = NULL;
    private $mac_address = NULL;
    private $uniprint_issue = NULL;

    //------------------------------------------------------
    // CONSTRUCTOR
    //------------------------------------------------------

    function __construct() {
        if(func_num_args() === 15) {
            call_user_func_array(array($this, 'create'), func_get_args());
        }
    }

    //------------------------------------------------------
    // METHODS
    //------------------------------------------------------

    function create($wo, $email, $type, $phone, $office, $location, $comp_no, $duration, $phone_os, $comp_os, $last_restart, $ip, $mac, $preferred_contact, $uniprint_issue) {
        $this->workOrder = $wo;
        $this->email = $email;
        $this->requestor_type = $type;
        $this->phone_number = $phone;
        $this->office_extension = $office;
        $this->issue_location = $location;
        $this->computer_no = $comp_no;
        $this->issue_duration = $duration;
        $this->phone_software = $phone_os;
        $this->computer_software = $comp_os;
        $this->last_restart = $last_restart;
        $this->ip_address = $ip;
        $this->mac_address = $mac;
        $this->preferred_contact = $preferred_contact;
        $this->uniprint_issue = $uniprint_issue;
    }

    function save() {
        require_once('database.php');
        $db = new database();
        try {
            $db->connect();
            $sql = 'INSERT INTO RequestorInfo (WorkOrder, Email, RequestorType, PhoneNumber, OfficeExtension, IssueLocation, ComputerNumber, IssueDuration, PhoneSoftware, ComputerSoftware, LastRestart, IpAddress, MacAddress, PreferredContact, PrintIssue)
                    VALUES (:workOrder, :email, :requestor_type, :phone_number, :office_extension, :issue_location, :computer_no, :issue_duration, :phone_software, :computer_software, :last_restart, :ip_address, :mac_address, :preferred_contact, :uniprint_issue)';
            $ps = $db->getConnection()->prepare($sql);
            $ps->bindParam(':workOrder', $this->workOrder);
            $ps->bindParam(':email', $this->email);
            $ps->bindParam(':requestor_type', $this->requestor_type);
            $ps->bindParam(':phone_number', $this->phone_number);
            $ps->bindParam(':office_extension', $this->office_extension);
            $ps->bindParam(':issue_location', $this->issue_location);
            $ps->bindParam(':computer_no', $this->computer_no);
            $ps->bindParam(':issue_duration', $this->issue_duration);
            $ps->bindParam(':phone_software', $this->phone_software);
            $ps->bindParam(':computer_software', $this->computer_software);
            $ps->bindParam(':last_restart', $this->last_restart);
            $ps->bindParam(':ip_address', $this->ip_address);
            $ps->bindParam(':mac_address', $this->mac_address);
            $ps->bindParam(':preferred_contact', $this->preferred_contact);
            $ps->bindParam(':uniprint_issue', $this->uniprint_issue);
            if($ps->execute()) {
                return true;
            } else {
                die('Connection Error --- ' . $ps->errorInfo()[2]);
                return false;
            }
            $db->disconnect();
        } catch(PDOException $e) {
            die('Connection Error --- ' . $e->getMessage());
        }
    }

}

?>
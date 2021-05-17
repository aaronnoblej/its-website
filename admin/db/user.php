<?php

//---------------------------------------------------------
// USER CLASS
//---------------------------------------------------------

class User {

    //---------------------------------------------------------
    // INSTANCE VARIABLES
    //---------------------------------------------------------

    //ID
    protected $id = 0;
    function getId() {return $this->id;}
    function setId($val) {$this->id = (int)$val;}

    //First Name
    protected $firstName = "";
    function getFirstName() {return $this->firstname;}
    function setFirstName($val) {$this->firstname = $val;}

    //Last Name
    protected $lastName = "";
    function getLastName() {return $this->lastName;}
    function setLastName($val) {$this->lastName = $val;}

    //Username
    protected $username = "";
    function getUsername() {return $this->username;}
    function setUsername($val) {$this->username = $val;}

    //Password
    protected $password = "";
    function getPassword() {return $this->password;}
    function setPassword($val) {$this->password = $val;}

    //Group
    protected $groupNo = "";
    function getGroup() {return $this->groupNo;}
    function setGroup($val) {$this->groupNo = (int)$val;}

    //---------------------------------------------------------
    // CONSTRUCTORS
    //---------------------------------------------------------



    //---------------------------------------------------------
    // METHODS
    //---------------------------------------------------------

    //Create a new user
    function create($firstName, $lastName, $username) {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setUsername($username);
    }

}

//---------------------------------------------------------
// END USER CLASS
//---------------------------------------------------------

?>
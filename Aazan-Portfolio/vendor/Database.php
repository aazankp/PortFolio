<?php

class Database {
    private $hostname = "localhost";
    private $rootname = "root";
    private $password = "";
    private $dbname = "portfolio";
    private $conn = null;
    private $query = null;
    private $result = null;
    
    public function __construct()
    {
        $this->conn = mysqli_connect($this->hostname, $this->rootname, $this->password, $this->dbname);
        if (mysqli_connect_errno()) die("Connection Failed!");
    }

    public function signup ($fname, $email, $address, $zipcode, $mobile, $dob, $password, $profile, $occupation, $myworkurl, $cvFile_name) {
        $this->query = "INSERT INTO users (fullName, email, address, zipcode, mobile, DOB, password, profile, occupation, workUrl, resume) VALUES ('$fname', '$email', '$address', '$zipcode', '$mobile', '$dob', '$password', '$profile', '$occupation', '$myworkurl', '$cvFile_name')";
        $this->result = mysqli_query($this->conn, $this->query);
        return $this->result;
    }
}

?>
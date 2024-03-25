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

    public function signup ($fname, $email, $address, $zipcode, $mobile, $dob, $password, $profile, $occupation, $myworkurl, $cvFile_name)
    {
        $this->query = "INSERT INTO users (fullName, email, address, zipcode, mobile, DOB, password, profile, occupation, workUrl, resume) VALUES ('$fname', '$email', '$address', '$zipcode', '$mobile', '$dob', '$password', '$profile', '$occupation', '$myworkurl', '$cvFile_name')";
        $this->result = mysqli_query($this->conn, $this->query);
        return $this->result;
    }

    public function signin ($email, $password)
    {
        $this->query = "SELECT userId, email, password FROM users WHERE email='$email' AND password='$password'";
        $this->result = mysqli_query($this->conn, $this->query);
        return $this->result;
    }

    public function portFolioInsertion ($about, $contact, $eduArr, $srvArr, $expArr, $sklArr, $prjtArr, $iUserId)
    {
        $about = mysqli_real_escape_string($this->conn, $about);
        $contact = mysqli_real_escape_string($this->conn, $contact);
        $eduArr = mysqli_real_escape_string($this->conn, $eduArr);
        $srvArr = mysqli_real_escape_string($this->conn, $srvArr);
        $expArr = mysqli_real_escape_string($this->conn, $expArr);
        $sklArr = mysqli_real_escape_string($this->conn, $sklArr);
        $prjtArr = mysqli_real_escape_string($this->conn, $prjtArr);
        $this->query = "INSERT INTO portfolioformdata (about, contact, education, services, experiences, skills, projects, userId) VALUES ('$about', '$contact', '$eduArr', '$srvArr', '$expArr', '$sklArr', '$prjtArr', '$iUserId')";
        $this->result = mysqli_query($this->conn, $this->query);
        return $this->result;
    }

    public function fetchPortFolio ($iUserId)
    {
        $this->query = "SELECT * FROM portfolioformdata WHERE PortFolio_Id='$iUserId'";
        // die($this->query);
        $this->result = mysqli_query($this->conn, $this->query);
        return $this->result;
    }
}

?>
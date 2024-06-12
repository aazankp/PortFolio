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

    public function signup ($fname, $email, $address, $mobile, $password, $profile, $occupation, $myworkurl, $cvFile_name)
    {
        $fname = mysqli_real_escape_string($this->conn, $fname);
        $email = mysqli_real_escape_string($this->conn, $email);
        $address = mysqli_real_escape_string($this->conn, $address);
        $mobile = mysqli_real_escape_string($this->conn, $mobile);
        $password = mysqli_real_escape_string($this->conn, $password);
        $occupation = mysqli_real_escape_string($this->conn, $occupation);
        $myworkurl = mysqli_real_escape_string($this->conn, $myworkurl);
        $UId = $this->generateUUID();

        $this->query = "INSERT INTO users (userId, fullName, email, address, mobile, password, oldPassword, profile, occupation, workUrl, resume) VALUES ('$UId', '$fname', '$email', '$address', '$mobile', '$password', '$password', '$profile', '$occupation', '$myworkurl', '$cvFile_name')";
        $this->result = mysqli_query($this->conn, $this->query);
        return $this->result;
    }

    public function signin ($email, $password)
    {
        $email = mysqli_real_escape_string($this->conn, $email);
        $password = mysqli_real_escape_string($this->conn, $password);

        $this->query = "SELECT userId, email, password FROM users WHERE email='$email' AND password='$password'";
        $this->result = mysqli_query($this->conn, $this->query);
        return $this->result;
    }

    public function portFolioInsertion ($about, $contact, $eduArr, $srvArr, $expArr, $sklArr, $prjtArr, $portfolioUrl, $iUserId)
    {
        $about = mysqli_real_escape_string($this->conn, $about);
        $contact = mysqli_real_escape_string($this->conn, $contact);
        $eduArr = mysqli_real_escape_string($this->conn, $eduArr);
        $srvArr = mysqli_real_escape_string($this->conn, $srvArr);
        $expArr = mysqli_real_escape_string($this->conn, $expArr);
        $sklArr = mysqli_real_escape_string($this->conn, $sklArr);
        $prjtArr = mysqli_real_escape_string($this->conn, $prjtArr);
        $PId = $this->generateUUID();

        $this->query = "INSERT INTO portfolioformdata (PortFolio_Id, about, contact, education, services, experiences, skills, projects, portfolioUrl, userId) VALUES ('$PId', '$about', '$contact', '$eduArr', '$srvArr', '$expArr', '$sklArr', '$prjtArr', '$portfolioUrl', '$iUserId')";
        $this->result = mysqli_query($this->conn, $this->query);
        return $this->result;
    }

    public function portFolioUpdate ($about, $contact, $eduArr, $srvArr, $expArr, $sklArr, $prjtArr, $portfolioUrl, $iUserId)
    {
        $about = mysqli_real_escape_string($this->conn, $about);
        $contact = mysqli_real_escape_string($this->conn, $contact);
        $eduArr = mysqli_real_escape_string($this->conn, $eduArr);
        $srvArr = mysqli_real_escape_string($this->conn, $srvArr);
        $expArr = mysqli_real_escape_string($this->conn, $expArr);
        $sklArr = mysqli_real_escape_string($this->conn, $sklArr);
        $prjtArr = mysqli_real_escape_string($this->conn, $prjtArr);

        $this->query = "UPDATE portfolioformdata SET about='$about', contact='$contact', education='$eduArr', services='$srvArr', experiences='$expArr', skills='$sklArr', projects='$prjtArr', portfolioUrl='$portfolioUrl' WHERE userId='$iUserId'";
        $this->result = mysqli_query($this->conn, $this->query);
        return $this->result;
    }

    public function fetchPortFolio ($iUserId)
    {
        $this->query = "SELECT * FROM portfolioformdata WHERE userId='$iUserId'";
        $this->result = mysqli_query($this->conn, $this->query);
        return $this->result;
    }

    public function fetchUser ($iUserId)
    {
        $this->query = "SELECT * FROM users WHERE userId='$iUserId'";
        $this->result = mysqli_query($this->conn, $this->query);
        return $this->result;
    }

    public function updateUser($name, $email, $mobile, $occupation, $workUrl, $address, $profImg, $resume, $iUserId)
    {
        $name = mysqli_real_escape_string($this->conn, $name);
        $email = mysqli_real_escape_string($this->conn, $email);
        $mobile = mysqli_real_escape_string($this->conn, $mobile);
        $occupation = mysqli_real_escape_string($this->conn, $occupation);
        $workUrl = mysqli_real_escape_string($this->conn, $workUrl);
        $address = mysqli_real_escape_string($this->conn, $address);

        $this->query = "UPDATE users SET fullName='$name', email='$email', mobile='$mobile', occupation='$occupation', workUrl='$workUrl', address='$address', profile='$profImg', resume='$resume' WHERE userId='$iUserId'";
        $this->result = mysqli_query($this->conn, $this->query);
        return $this->result;
    }
    
    public function updatePassword($current_pass, $new_pass, $iUserId)
    {
        $current_pass = mysqli_real_escape_string($this->conn, $current_pass);
        $new_pass = mysqli_real_escape_string($this->conn, $new_pass);

        $this->query = "UPDATE users SET password='$new_pass', oldPassword='$current_pass' WHERE userId='$iUserId'";
        $this->result = mysqli_query($this->conn, $this->query);
        return $this->result;
    }

    public function verifyEmail($email)
    {
        $email = mysqli_real_escape_string($this->conn, $email);

        $this->query = "SELECT userId, email FROM users WHERE email='$email'";
        $this->result = mysqli_query($this->conn, $this->query);
        return $this->result;
    }

    public function insOTP($otp, $iUserId)
    {
        $this->query = "UPDATE users SET otp='$otp' WHERE userId='$iUserId'";
        $this->result = mysqli_query($this->conn, $this->query);
        return $this->result;
    }

    public function otpSendStatus($otpStatus, $otpVerifed, $iUserId)
    {
        $this->query = "UPDATE users SET otpSend='$otpStatus', otpVerified='$otpVerifed' WHERE userId='$iUserId'";
        $this->result = mysqli_query($this->conn, $this->query);
        return $this->result;
    }

    public function generateUUID() {
        $data = random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

}

?>
<?php
namespace Classes;

class inputValidtaion{
    protected $username;
    protected $email;
    protected $password;

    function __construct($username=null,$email,$password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public  function is_valid_email() {
        $this->email = filter_var($this->email, FILTER_SANITIZE_EMAIL);
    
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    public  function is_exists_email(){
        $allData = file_get_contents("./userDetails.txt");
    
        $isValidEmail = strpos($allData, $this->email);
    
        if(!$isValidEmail){
            return true;
        }
        return false;
    }

    public  function is_valid_username() {
        return preg_match('/^[a-zA-Z0-9]{3,20}$/', $this->username);
    }

    public  function is_exists_username(){
        $allData = file_get_contents("./userDetails.txt");
    
        $isValidUsername = strpos($allData, $this->username);
    
        if(!$isValidUsername){
            return true;
        }
        return false;
    }

    public  function is_valid_password(){
        return strlen($this->password)>=4 ? true:false;
    }


    public function getUsername(){
        return $this->username;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getEncryptedPassword(){
        $encryptedPassword = password_hash($this->password, PASSWORD_BCRYPT);

        return $encryptedPassword;
    }
}
<?php
namespace Classes;

use \Classes\inputValidation;

class userAuthentication extends inputValidtaion{
    
    private $role;

    function __construct($email, $password)
    {
        $this->role="";
        $this->email = $email;
        $this->password = $password;
    }


    private function is_password_matched($password){
        return password_verify($this->password, $password);
    }

    public function is_authenticate(){
        $fp = fopen("./userDetails.txt",'r');

        while($line = fgets($fp)){
            $data = explode(", ",$line);

            $role=trim($data[0]);
            $username = trim($data[1]);
            $email = trim($data[2]);
            $password = trim($data[3]);

            if($this->email === $email && $this->is_password_matched($password)){
                $this->role=$role;
                $this->username = $username;
                $this->email = $email;
                return true;
            }
        }

        return false;
    }

    public function getRole(){
        return $this->role;
    }
}
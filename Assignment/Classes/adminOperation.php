<?php
namespace Classes;


class adminOperation{
    private $role;
    private $username;
    private $email;
    private $password;

    private $allUsers;
    private $allInfo;

    public function __construct()
    {
        $this->allUsers = [];
        $this->allInfo = [];
        // $this->password = "admin";
        $lines = file("./userDetails.txt");
        // $lines = file("..".DIRECTORY_SEPARATOR."userDetails.txt");


        foreach($lines as $line){
            $data = explode(", ",$line);

            $this->role = $data[0];
            $this->username = $data[1];
            $this->email = $data[2];
            $this->password = $data[3];

            $this->allUsers[]=[
                'role'=>$this->role,
                'username'=>$this->username,
                'email'=>$this->email
            ];

            $this->allInfo[]=[
                'role'=>$this->role,
                'username'=>$this->username,
                'email'=>$this->email,
                'password'=>$this->password
            ];
        }

    }

    private function getAllInfo(){

    }
    public function addUser($role, $username, $email, $password){

    }

    public function editRole($username,$role){
        $fp = fopen('./userDetails.txt','w');

        for($i=0;$i<count($this->allInfo);$i++){
            if($this->allInfo[$i]['username'] == $username){
                $this->allInfo[$i]['role'] = $role;
            }

            $contents = $this->allInfo[$i]['role'].$this->allInfo[$i]['username'].$this->allInfo[$i]['email'].$this->allInfo[$i]['password'];
            fwrite($fp,$contents."\n");
        }

        fclose($fp);
    }

    public function deleteRole($username){

    }

    public function getAllUsers(){
        return json_encode($this->allUsers);
    }
}
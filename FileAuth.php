<?php
include('CommonAuthInterface.php');

//FileAuth interface implementation
class FileAuth implements CommonAuthInterface
{
    protected $username;
    protected $password;
    
    public function __construct($post)
    {
        $this->username=$post->getUsername();
        $this->password=$post->getPassword();
    }
    public function authenticate()
    {
        $myFile = fopen("user.txt","r")or die("Unable to open file!");

        if($this->username!==rtrim(fgets($myFile),"\r\n"))
        {
            echo "Authentication failed";
            return false;
        }
        if($this->password!==rtrim(fgets($myFile),"\r\n"))
        {
            echo "Authentication failed";
            return false;
        }
        echo "Authentication success";
        return true;
        fclose($myFile);
    }
    
}
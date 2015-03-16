<?php

//MySQLAuth interface implementation
class MySQLAuth implements CommonAuthInterface
{
    protected $username;
    protected $password;
    protected $conn;

    public function __construct($post)
    {
        $this->username=$post->getUsername();
        $this->password=$post->getPassword();
        try
        {
            $this->conn = new PDO('mysql:host=localhost;dbname=test','root','1234');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo 'ERROR: ' .$e->getMessage();
        }
    }
    public function authenticate()
    {
        $data=$this->conn->query('SELECT UserName FROM USER WHERE UserName= '.$this->conn->quote($this->username).'AND Password = '.$this->conn->quote($this->password));
//        echo var_dump($data);
        $result=$data->fetchAll();
        if (count($result)!=1)
        {
          echo "Authentication failed";   
          return;
        }
        echo "Authentication success";
    }
    
}
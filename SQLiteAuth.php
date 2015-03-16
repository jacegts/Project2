<?php

class SQLiteAuth implements CommonAuthInterface
{
    public function __construct($post)
    {        
        $this->username=$post->getUsername();
        $this->password=$post->getPassword();
        try
        {
            $this->conn = new PDO('sqlite:SQLitetest.sqlite');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo 'ERROR: ' .$e->getMessage();
        }
    }
    public function authenticate()
    {
        $data=$this->conn->query('SELECT Username FROM Test WHERE UserName= '.$this->conn->quote($this->username).'AND Password = '.$this->conn->quote($this->password));
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
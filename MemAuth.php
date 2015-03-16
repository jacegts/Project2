<?php

//MemAuth interface implementation
class MemAuth implements CommonAuthInterface
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
        if ($this->username !== 'memauth')
        {
            echo "Authentication failed.";
            return false;
        }
        if ($this->password !== '123456')
        {
            echo "Authentication failed";
            return false;
        }
        echo "Authentication success";
        return true;
    }
}
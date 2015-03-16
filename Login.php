<?php
include('PostRequest.php');
include('FileAuth.php');
include('MemAuth.php');
include('MySQLAuth.php');
include('SQLiteAuth.php');

//used in PostRequest constructor to validate post variables before creating object 
function postValidation($postArray)
{
    if (!isset($postArray['username']))
    {
        throw new InvalidArgumentException(__METHOD__.'('.__LINE__.')Error; no username dependency');
    }
    if (!isset($postArray['password']))
    {
        throw new InvalidArgumentException(__METHOD__.'('.__LINE__.')Error; no password dependency');
    }
    if (!isset($postArray['authType']))
    {
        throw new InvalidArgumentException(__METHOD__.'('.__LINE__.')Error; no authType dependency');
    }
    //validate dataType
}

//used when assigning PostRequest values to clear any special/html chars and entities
function clearHTML($html)
{
    return preg_replace('/[^a-zA-Z0-9\s]/', '', strip_tags(html_entity_decode($html)));
}

//checks for the selected authentication type selected at login
function authTypeCheck($post)
{
    if ($post->getAuthType()==='Mem')
    {
        return new MemAuth($post);
    }
    if($post->getAuthType()==='File')
    {
        return new FileAuth($post);
    }
    if ($post->getAuthType()==='MySQL')
    {
        return new MySQLAuth($post);
    }
    if($post->getAuthType()==='SQLite')
    {
        return new SQLiteAuth($post);
    }
}   

//check username and password for correct format
function formatCheck($postRequest)
{
    $regex='^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$^';
    if(preg_match($regex,$postRequest->getUsername())!=1)
    {
        echo "Invalid username format please try again";
        return false;
    }
    if(preg_match($regex,$postRequest->getPassword())!=1)
    {
        echo "Invalid password format please try again";
        return false;
    }
    return true;
}

$postRequest= new PostRequest($_POST);

authTypeCheck($postRequest)->authenticate();

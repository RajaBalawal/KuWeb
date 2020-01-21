<?php
require_once("config.php");

class Database
{
    public $Mysqli;

    function __construct()
    {
        $this->Mysqli = new mysqli(SERVER_NAME, USER_NAME, USER_PASSWORD, DATABASE_NAME);
        if ($this->Mysqli->connect_errno) {
            die("Failed to connect: " . $this->Mysqli->connect_error);
        }
    }

    function __destruct()
    {
        $this->Mysqli->close();
    }

}



<?php


class DbInstance
{
    public  $con;

    public function __construct()
    {
        // Create connection
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);
        if ($conn->connect_error) {
            die("Database Connection failed. Please configure ");
        }
        $this->con = $conn;

// Check connection

    }


}
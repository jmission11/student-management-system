<?php
    function connection(){
        $host = "localhost";
        $username = "root";
        $password = "asd123";
        $database = "student_system";

        $con = new mysqli($host, $username, $password, $database);

        if ($con->connect_error){
            die("Connection failed: " . $con->connect_error);
        }else{
            return $con;
        }

    }
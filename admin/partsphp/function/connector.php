<?php
    function connect(){
        $host = "localhost";
        $dbname = "simsson_cire";
        $user = "root";
        $password = "root";
        $charset = "utf8mb4";
        $options =[
            PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try{
            return new PDO("mysql:host=$host;port=8889;dbname=$dbname;charset=$charset", $user, $password, $options);
        }catch( PDOException $e ){
            throw new PDOException($e -> getMessage(), (int)$e->getCode());
        }
    }
?>
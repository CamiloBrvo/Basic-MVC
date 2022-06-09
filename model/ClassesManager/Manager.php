<?php

class Manager 
{
    /**
     * Establishes the connection to the database server
     *
     * @return void
     */
    protected function dbConnect()
    {
        $login = "username";
        $password = "password";
        $bd = "database";
        $server = "server";

        try
        {
            $cnx = new PDO("mysql:host=$server;dbname=$bd", $login, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
            $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $cnx;
        } 
        catch (PDOException $e) 
        {
            print "PDO connection error";
            die();
        }
    }

    /**
     * Returns the current PDO object if it exists or instantiates a new one otherwise (singleton pattern)
     *
     * @return void
     */
    protected function getPDO() 
    {
        static $pdo = null;
        if ($pdo == null) {
            $pdo = $this->dbConnect();
        }
        return $pdo;
    }
    
}

?>
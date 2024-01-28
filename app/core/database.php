<?php

class database {

    public $host     = DBHOSTNAME;
    public $user     = DBUSER;
    public $database = DBNAME;
    public $password = DBPASS;

    public function __construct()
    {
        //Database connection
        $GLOBALS['db'] = mysqli_connect($this->host,$this->user,$this->password,$this->database);

        // Check connection
        if($GLOBALS['db'] === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
    }
}

<?php 

define('APP_NAME', 'skillsparq');
define('APP_DESC', 'freelancing platform for sri lankans');


if($_SERVER['SERVER_NAME'] == 'localhost'){
    // database connection for local server
    define('DBHOSTNAME', 'localhost');
    define('DBNAME', 'skillsparq');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', 'mysql');

}else{ 
    // database connection for live server
    define('DBHOSTNAME', 'localhost');
    define('DBNAME', 'skillsparq');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', 'mysql');
}

?>
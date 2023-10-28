<?php
class BuyerHandler extends database
{


    public function emailCheck($email){
        
        $userName=mysqli_real_escape_string($GLOBALS['db'],$email);
        $userCheck = "SELECT * FROM buyer WHERE email='$email'  LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $userCheck);
        return mysqli_fetch_assoc($result);

    }


}
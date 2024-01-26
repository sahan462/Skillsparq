<?php
class LoginHandler extends database
{

    public function emailCheck($email)
    {;
        $email=mysqli_real_escape_string($GLOBALS['db'],$email);
        $userCheck = "SELECT * FROM User WHERE user_email='$email' LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $userCheck);
        return mysqli_fetch_assoc($result);
    }

    public function phoneNumberCheck($phoneNumber)
    {
        $userName=mysqli_real_escape_string($GLOBALS['db'],$phoneNumber);
        $userCheck = "SELECT * FROM seller WHERE phone_number='$phoneNumber' LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $userCheck);
        return mysqli_fetch_assoc($result);
    }

    //validate buyer, cutomer support assistant and administrator
    public function userCheck($email,$password)
    {
        $email=mysqli_real_escape_string($GLOBALS['db'],$email);
        $password=mysqli_real_escape_string($GLOBALS['db'],$password);
        $userCheck = "SELECT * FROM user WHERE user_email='$email' LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $userCheck);
        $row=mysqli_fetch_assoc($result);

        if(password_verify($password."skillsparq", $row['user_password']))
        {   
            return $row;
        }else{
            return false;
        }
    }

    //validate seller
    public function sellerCheck($SellerId,$password)
    {
        $userName=mysqli_real_escape_string($GLOBALS['db'],$SellerId);
        $password=mysqli_real_escape_string($GLOBALS['db'],$password);
        
        $userCheck = "SELECT * FROM user WHERE user_id='$SellerId' LIMIT 1";
        $result = mysqli_query($GLOBALS['db'], $userCheck);

        $row=mysqli_fetch_assoc($result);

        if(password_verify($password."skillsparq", $row['user_password']))
        {   
            return $row;
        }else{
            return false;
        }
    }

}
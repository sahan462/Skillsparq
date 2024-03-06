<?php
//login controller for buyer, 
class LoginUser extends Controller
{

    function __construct(){
        $this->profileHandler = $this->model('ProfileHandler');    
    }

    public function index(){

        $data['var'] = "Login Page";
        $data['title'] = "SkillSparq";

        $errors = array();         
        $errors["email"] = "";
        $errors["password"] = "";
        $data['errors'] = $errors;



    }
}
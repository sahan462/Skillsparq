<?php
//login controller for buyer, 
class LoginUser extends Controller
{

    public function index(){

        $data['var'] = "Login Page";
        $data['title'] = "SkillSparq";

        $errors = array();         
        $errors["email"] = "";
        $errors["password"] = "";
        $data['errors'] = $errors;

        $this->view('loginUser', $data);

    }
}
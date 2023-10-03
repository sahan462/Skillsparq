<?php

class Login extends Controller
{

    public function index(){

        $data['var'] = "Home Page";
        $data['title'] = "SkillSparq";

        $this->view('login', $data);
    }

}

?>
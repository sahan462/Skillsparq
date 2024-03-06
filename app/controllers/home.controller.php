<?php

class Home extends Controller
{

    public function index(){

        $data['var'] = "Home Page";
        $data['title'] = "SkillSparq";

        $this->view('home', $data);
    }

}

?>
<?php

class About extends Controller
{
    public function index(){
        $data['var'] = "About";
        $data['title'] = "SkillSparq";
        $this->view('About', $data);
    }
}

?>
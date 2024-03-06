<?php

class Test extends Controller
{

    public function index(){

        $data['var'] = "Home Page";
        $data['title'] = "SkillSparq";

        $this->view('test', $data);
    }

}

<?php

class AddJob extends Controller
{

    public function index(){

        $data['var'] = "AddJob";
        $data['title'] = "SkillSparq";

        $this->view('addJob', $data);
    }

}

?>
<?php

class Earnings extends Controller
{

    public function index(){

        $data['var'] = "Earnings";
        $data['title'] = "SkillSparq";

        $this->view('earnings', $data);
    }

}

?>
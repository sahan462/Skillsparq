<?php

class HelpCenter extends Controller
{

    public function index(){

        $data['var'] = "Help Center";
        $data['title'] = "SkillSparq";

        $this->view('helpCenter', $data);
    }

}

?>
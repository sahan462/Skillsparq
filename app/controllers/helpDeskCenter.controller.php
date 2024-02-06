<?php

class HelpDeskCenter extends Controller
{


    public function index()
    {

        $data['var'] = "HelpDeskCenter";
        $data['title'] = "SkillSparq";
        $this->view('HelpDeskCenter', $data);
    }
}

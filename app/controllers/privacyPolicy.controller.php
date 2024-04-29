<?php

class privacyPolicy extends Controller
{

    public function index()
    {

        $data['var'] = "privacyPolicy";
        $data['title'] = "SkillSparq";

        $this->view('privacyPolicy', $data);
    }
}

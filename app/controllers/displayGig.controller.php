<?php

class displayGig extends Controller
{

    public function index(){

        $data['var'] = "Display Gig Page";
        $data['title'] = "SkillSparq";

        $this->view('displayGig', $data);
    }

}

?>
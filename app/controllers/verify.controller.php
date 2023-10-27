<?php

class Verify extends Controller
{

    public function index(){

        $data['var'] = "Register Buyer Page";
        $data['title'] = "SkillSparq";
        $data['stateInvalid'] = "";
        $data['stateAlready'] = "";
        $data['stateSuccess'] = "";
        $data['email'] = "";
        $data['error'] = "";

        $this->view('verify', $data);
    }

}

?>
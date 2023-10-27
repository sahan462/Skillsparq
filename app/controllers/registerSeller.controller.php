<?php

class RegisterSeller extends Controller
{

    public function index(){

        $data['var'] = "Register Buyer Page";
        $data['title'] = "SkillSparq";

        $this->view('registerSeller', $data);
    }

}

?>
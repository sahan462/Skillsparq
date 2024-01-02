<?php

class Payment extends Controller
{

    public function index(){

        $data['var'] = "Payment";
        $data['title'] = "SkillSparq";

        $this->view('payment', $data);
    }

}

?>
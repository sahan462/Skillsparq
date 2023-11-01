<?php

class BuyerProfile extends Controller
{

    public function index(){

        $data['var'] = "buyerProfile";
        $data['title'] = "SkillSparq";

        $this->view('buyerProfile', $data);
    }

}

<?php

class BuyerHelp extends Controller
{

    public function index(){

        $data['var'] = "Buyer Help Page";
        $data['title'] = "SkillSparq";

        $this->view('buyerHelp', $data);
    }

}

?>
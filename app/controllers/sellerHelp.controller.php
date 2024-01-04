<?php

class SellerHelp extends Controller
{

    public function index(){

        $data['var'] = "Seller Help Page";
        $data['title'] = "SkillSparq";

        $this->view('sellerHelp', $data);
    }

}

?>
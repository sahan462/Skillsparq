<?php

class SellerProfile extends Controller
{

    public function index(){

        $data['var'] = "Seller Profile";
        $data['title'] = "SkillSparq";

        $this->view('sellerProfile', $data);
    }

}

?>
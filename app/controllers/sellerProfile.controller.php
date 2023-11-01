<?php

class BuyerProfile extends Controller
{

    public function index()
    {

        $data['var'] = "sellerProfile";
        $data['title'] = "SkillSparq";

        $this->view('sellerProfile', $data);
    }
}

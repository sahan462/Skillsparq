<?php

class SellerDashboard extends Controller
{
    public function index()
    {
        $data['var'] = "Home Page";
        $data['title'] = "SkillSparq";

        $this->view('sellerdashboard', $data);
    }
}

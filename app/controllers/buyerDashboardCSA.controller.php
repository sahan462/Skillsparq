<?php

class buyerDashboardCSA extends Controller
{

    public function index()
    {

        $data['var'] = "buyerDashboardCSA";
        $data['title'] = "SkillSparq";


        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $data['id'] = $id;


        $this->view('buyerDashboardCSA', $data);
    }
}

<?php

class Order extends Controller
{

    public function index()
    {

        $data['var'] = "Order Page";
        $data['title'] = "SkillSparq";

        $this->view('order', $data);
    }

    public function verifyPayment()
    {
        print_r($_GET);
    }




}

?>
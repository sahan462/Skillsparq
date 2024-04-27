<?php

class viewOrderDetails extends Controller
{
    private $paymentHandlerModel;
    private $inquiryHandlerModel;

    public function __construct()

    {
        $this->inquiryHandlerModel = $this->model('InquiryHandler');
        $this->paymentHandlerModel = $this->model('paymentHandler');
    }

    public function index()
    {

        $data['var'] = "viewOrderDetails";
        $data['title'] = "SkillSparq";




        $this->view('viewOrderDetails', $data);
    }
}

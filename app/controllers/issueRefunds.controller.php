<?php

class issueRefunds extends Controller
{
    private $paymentHandlerModel;

    public function __construct()
    {
        $this->paymentHandlerModel = $this->model('paymentHandler');
    }

    public function index()
    {

        $data['var'] = "issueRefunds";
        $data['title'] = "SkillSparq";
        $refund = $this->paymentHandlerModel->viewRefund();
        $data['refund'] = $refund;

        $this->view('issueRefunds', $data);
    }
}

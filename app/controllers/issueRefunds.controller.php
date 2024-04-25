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
        $payment_id = isset($_GET['payment_id']) ? $_GET['payment_id'] : null;
        $data['payment_id'] = $payment_id;
        $data['var'] = "issueRefunds";
        $data['title'] = "SkillSparq";
        $refund = $this->paymentHandlerModel->viewRefund();
        $data['refund'] = $refund;

        $this->view('issueRefunds', $data);
    }
}

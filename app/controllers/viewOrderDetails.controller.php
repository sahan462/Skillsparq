<?php

class viewOrderDetails extends Controller
{
    private $paymentHandlerModel;
    private $OrderHandlerModel;
    private $inquiryHandlerModel;

    public function __construct()

    {
        $this->OrderHandlerModel = $this->model('OrderHandler');
        $this->paymentHandlerModel = $this->model('paymentHandler');
        $this->inquiryHandlerModel = $this->model('inquiryHandler');
    }

    public function index()
    {

        $data['var'] = "viewOrderDetails";
        $data['title'] = "SkillSparq";

        $order_id = isset($_GET['order_id']) ? $_GET['order_id'] : null;


        $data['order_id'] = $order_id;
        $viewOrder = $this->OrderHandlerModel->viewOrder($order_id);
        $data['viewOrder'] = $viewOrder;
        $package = $this->OrderHandlerModel->viewOrderPackage($order_id);
        $data['package'] = $package;


        $complaint = $this->inquiryHandlerModel->viewComplaintForOrder($order_id);
        $data['complaint'] = $complaint;






        $this->view('viewOrderDetails', $data);
    }
}

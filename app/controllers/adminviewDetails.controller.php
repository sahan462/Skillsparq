<?php

class adminviewDetails extends Controller
{
    private $inquiryHandlerModel;
    private $userHandlerModel;
    private $paymentHandlerModel;
    private $GigHandlerModel;
    private $OrderHandlerModel;
    public function __construct()
    {
        $this->inquiryHandlerModel = $this->model('inquiryHandler');
        $this->userHandlerModel = $this->model('userHandler');
        $this->paymentHandlerModel = $this->model('paymentHandler');
        $this->GigHandlerModel = $this->model('GigHandler');
        $this->OrderHandlerModel = $this->model('OrderHandler');
    }

    public function index()
    {

        $data['var'] = "adminviewDetails";
        $data['title'] = "SkillSparq";

        $users = $this->userHandlerModel->getusers();
        $data['users'] = $users;
        $payments = $this->paymentHandlerModel->getpayments();
        $data['payments'] = $payments;

        $gigs = $this->GigHandlerModel->getRecentGigs();

        $data['gigs'] = $gigs;
        $recentGigs = $this->GigHandlerModel->getRecentGigs();

        if ($recentGigs) {

            $data['recentGigs'] = $recentGigs;
        } else {
            echo "<script>alert('getAllJobs function is not Accessible!')</script>";
        }

        $data['recentGigs'] = $recentGigs;

        $orders = $this->OrderHandlerModel->getAllOrders();
        $data['orders'] = $orders;

        $this->view('adminviewDetails', $data);
    }
}

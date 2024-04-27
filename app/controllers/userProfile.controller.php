<?php

class userProfile extends Controller
{
    private $inquiryHandlerModel;
    private $userHandlerModel;
    private $profileHandlerModel;
    private $orderHandlerModel;
    private $GigHandlerModel;
    private $paymentHandlerModel;
    public function __construct()
    {
        $this->inquiryHandlerModel = $this->model('inquiryHandler');
        $this->userHandlerModel = $this->model('userHandler');
        $this->orderHandlerModel = $this->model('orderHandler');
        $this->profileHandlerModel = $this->model('profileHandler');
        $this->GigHandlerModel = $this->model('GigHandler');
        $this->paymentHandlerModel = $this->model('paymentHandler');
    }

    public function index()
    {
        $inquiry_id = isset($_GET['inquiry_id']) ? $_GET['inquiry_id'] : null;
        $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : null;

        $data['var'] = "userProfile";
        $data['title'] = "SkillSparq";
        $data['var'] = "viewComplaints";
        $data['title'] = "SkillSparq";
        $data['inquiryId'] = $inquiry_id;
        $viewComplaint = $this->inquiryHandlerModel->viewComplaints($inquiry_id);
        $data['viewComplaint'] = $viewComplaint;
        $userProfile = $this->userHandlerModel->userProfile($user_id);
        $data['userProfile'] = $userProfile;
        $orderSeller = $this->orderHandlerModel->getOrderSeller($user_id);
        $data['orderSeller'] = $orderSeller;
        $recentGigs = $this->GigHandlerModel->getRecentGigs();
        $data['recentGigs'] = $recentGigs;
        $recentComplaints = $this->inquiryHandlerModel->getComplaintsSeller($user_id);
        $data['recentComplaints'] = $recentComplaints;
        $paymentSeller = $this->paymentHandlerModel->paymentsSeller($user_id);
        $data['paymentSeller'] = $paymentSeller;



        $feedbacks = $this->profileHandlerModel->getUserFeedback();
        $data['feedbacks'] = $feedbacks;







        $this->view('userProfile', $data);
    }
}

<?php

class userProfile extends Controller
{
    private $inquiryHandlerModel;
    private $userHandlerModel;
    private $orderHandlerModel;
    public function __construct()
    {
        $this->inquiryHandlerModel = $this->model('inquiryHandler');
        $this->userHandlerModel = $this->model('userHandler');
        $this->orderHandlerModel = $this->model('orderHandler');
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


        $this->view('userProfile', $data);
    }
}

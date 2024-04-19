<?php

class HCprofile extends Controller
{
    private $inquiryHandlerModel;
    private $profileHandlerModel;

    public function __construct()
    {
        $this->inquiryHandlerModel = $this->model('inquiryHandler');
        $this->profileHandlerModel = $this->model('profileHandler');
    }

    public function index()
    {

        $data['var'] = "viewHelpRequests";
        $data['title'] = "SkillSparq";
        $userId = $_SESSION['userId'];
        $profile =  $this->profileHandlerModel->getUserProfile($userId);
        $data['profile'] = $profile;

        $this->view('HCprofile', $data);
    }
}

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


        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $profilePic = "sfee";
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $country = $_POST['Country'];
            $about = $_POST['about'];
            $userId = $_SESSION['userId'];
            $userName = $_SESSION['userName'];
            $this->profileHandlerModel = $this->profileHandlerModel->updateCSA();
        }

        $this->view('HCprofile', $data);
    }
}

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
        $profile = $this->profileHandlerModel->getUserProfile($userId);
        $data['profile'] = $profile;
        $profPic = $this->profileHandlerModel->getProfPic($userId);
        $data['proPic'] = $profPic;


        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $profilePic = "istockphoto-1300512215-612x612.jpg65bd1301592ec4.33593279_1706889985_kPerera"; // Placeholder for now
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $country = $_POST['Country'];
            $about = $_POST['about'];
            $userId = $_SESSION['userId'];
            $userName = $_SESSION['userName'];

            // Update the profile
            $this->profileHandlerModel->updateCSA($profilePic, $firstName, $lastName, $country, $about, $userId);

            echo "Profile updated successfully";
        }

        $this->view('HCprofile', $data);
    }
}

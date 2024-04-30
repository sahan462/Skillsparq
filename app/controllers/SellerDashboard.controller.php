<?php

class SellerDashboard extends Controller
{
    private $JobHandlerModel;
    private $ProfileHandlerModel;
    private $UserHandlerModel;

    public function __construct()
    {
        // creating instances for the models.
        $this->JobHandlerModel = $this->model('JobHandler');
        $this->ProfileHandlerModel = $this->model('ProfileHandler');
        $this->UserHandlerModel = $this->model('userHandler');
    }

    public function index()
    {
        if (!isset($_SESSION["phoneNumber"]) && !isset($_SESSION["password"])) {
            header("location: loginSeller");
        } else {
            $data['errors'] = $this->initiate();
            $data['var'] = "SellerDashboard";
            $data['title'] = "SkillSparq";

            $userId = $_SESSION['userId'];

            // Getting the seller's profile details from the ProfileHandlerModel.
            $data["sellerProfileDetails"] = $this->getSellerProfileDetails($userId);

            // Getting the seller's User details from the UserHandlerModel.
            $data['sellerUserDetails'] = $this->getSellerUserDetails($userId);

            // get The jobs for seller dashboard. Those are hardcoded in sellerdashboard view.php.
            $data['AllJobs'] = $this->JobHandlerModel->getJobsForSellerDashBoard();

            if (isset($_GET['SellerDashSelectJobType'])) {
                $jobType = $_GET['SellerDashSelectJobType'];
                // get the jobs for seller dashboard by filtering the job type
                $data['filter'] = $this->JobHandlerModel->getFilteredJobs($jobType);
                // $data['AllJobs'] = array_merge($data['AllJobs'], $data['filter']);
            } else {
                $data['filter'] = '';
            }

            // set the remaining session variables for sellerdashboard.
            $_SESSION['firstName'] = $data['sellerProfileDetails']['first_name'];
            $_SESSION['lastName'] = $data['sellerProfileDetails']['last_name'];
            $_SESSION['userName'] = $data['sellerProfileDetails']['user_name'];

            // show($data);
            $this->view('SellerDashboard', $data);
        }
    }

    public function initiate()
    {
        // Initialize error array
        $errors = array();
        $errors["password"] = "";
        $errors["email"] = "";
        $errors["agreement"] = "";

        return $errors;
    }

    //get profile Details of the Seller
    public function getSellerProfileDetails($userId)
    {
        $userProfile = $this->ProfileHandlerModel->getProfileData($userId);
        $userProfile = mysqli_fetch_assoc($userProfile);
        return $userProfile;
    }

    // get the User Details of the Seller
    public function getSellerUserDetails($userId)
    {
        $user = $this->UserHandlerModel->getUserData($userId);
        $user = mysqli_fetch_assoc($user);
        return $user;
    }
}

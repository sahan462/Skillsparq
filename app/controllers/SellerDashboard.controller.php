<?php

class SellerDashboard extends Controller
{
    private $JobHandlerModel;
    private $ProfileHandlerModel;
    private $UserHandlerModel;

    public function __construct()
    {   
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
            $data["sellerProfileDetails"] = $this->getSellerProfileDetails($userId);
            $data['sellerUserDetails'] = $this->getSellerUserDetails($userId);
            

            // get The jobs for seller dashboard. Those are hardcoded in sellerdashboard view.php

            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            
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

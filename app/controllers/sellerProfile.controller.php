<?php

class SellerProfile extends Controller
{
    private $GigHandlerModel;
    private $ProfileHandlerModel;
    
    public function __construct()
    {
        $this->GigHandlerModel = $this->model('GigHandler');
        $this->ProfileHandlerModel = $this->model('profileHandler');
    }

    public function index(){
        if(!isset($_SESSION["phoneNumber"]) && !isset($_SESSION["password"])) {

            header("location: loginUser");

        }else{
            $data['var'] = "Seller Profile";
            $data['title'] = "SkillSparq";
            $data["activeStatus"] =  "display: block;";
            $userId = $_SESSION["userId"];

            //get profile information
            $userProfile = $this->ProfileHandlerModel->getUserProfile($userId);
            $userProfile = mysqli_fetch_assoc($userProfile);
            $data["userProfile"] = $userProfile;
            print_r($data);

            //get recently added Gigs
            $recentGigs = $this->GigHandlerModel->getRecentGigs();

            if ($recentGigs) {

                $data['recentGigs'] = $recentGigs;
                
            } else {
                echo "<script>alert('getAllJobs function is not Accessible!')</script>";
            }
            
            $data['recentGigs'] = $recentGigs;

            // print_r(mysqli_fetch_assoc($data['recentGigs']));

            $this->view('sellerProfile', $data);
        } 
    }

}

?>
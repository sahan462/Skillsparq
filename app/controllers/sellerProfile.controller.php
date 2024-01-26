<?php

class SellerProfile extends Controller
{
    protected $GigHandlerModel;
    protected $ProfileHandlerModel;
    
    protected $userId;
    protected $userProfile;
    protected $recentGigs;
    protected $data;
    
    public function __construct()
    {
        $this->GigHandlerModel = $this->model('GigHandler');
        $this->ProfileHandlerModel = $this->model('profileHandler');
    }

    public function index()
    {
        if(!isset($_SESSION["phoneNumber"]) && !isset($_SESSION["password"])) {

            header("location: loginUser");

        }else{ 

            $data['var'] = "Seller Profile";
            $data['title'] = "SkillSparq";
            $data["activeStatus"] =  "display: block;";
            $sellerId = $_SESSION["userId"];
            $data["userProfile"] = $this->getSellerDetails($sellerId);

            $recentGigs = $this->GigHandlerModel->getGig($sellerId);

            if ($recentGigs) {
                $data['recentGigs'] = $recentGigs;
            } else {
                echo "<script>alert('getAllJobs function is not Accessible!')</script>";
            }
            
            $this->view('sellerProfile', $data);
        } 
    }

    //get profile information
    public function getSellerDetails($sellerId)
    {
        $userProfile = $this->ProfileHandlerModel->getUserProfile($sellerId);
        $userProfile = mysqli_fetch_assoc($userProfile);
        return $userProfile;
    }

    public function passDataArray()
    {
        $data['title'] = "SkillSparq";
    }

    
}

?>
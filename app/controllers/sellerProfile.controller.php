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

    public function index(){
        if(!isset($_SESSION["phoneNumber"]) && !isset($_SESSION["password"])) {

            header("location: loginUser");

        }else{
            $data['var'] = "Seller Profile";
            $data['title'] = "SkillSparq";
            $data["activeStatus"] =  "display: block;";
            $userId = $_SESSION["userId"];
            $gigId = 2;
            $data["userProfile"] = $this->getSellerDetails($userId);
            print_r($data);

            //get recently added Gigs
            $recentGigs = $this->GigHandlerModel->getGig($gigId,$userId);
            // not the recent gigs have to get the specific gigs which would be created by the seller.

            if ($recentGigs) {

                $data['recentGigs'] = $recentGigs;
                
            } else {
                echo "<script>alert('getAllJobs function is not Accessible!')</script>";
            }
            
            $data['recentGigs'] = $recentGigs;
            $data['recentGigs'] =mysqli_fetch_assoc($data['recentGigs']);
            $data['recentGigs'] = $this->recentGigs();
            print_r($data['recentGigs']);
            //print_r($_SESSION['gig_id']);
            $this->view('sellerProfile', $data);
        } 
    }

    //get profile information
    public function getSellerDetails($userId){
        $this->userProfile = $this->ProfileHandlerModel->getUserProfile($userId);
        $userProfile = mysqli_fetch_assoc($this->userProfile);
        return $userProfile;
    }

    public function recentGigs(){
        $this->recentGigs = $this->GigHandlerModel->getRecentGigs();
        if ($this->recentGigs) {

            $data['recentGigs'] = $this->recentGigs;
            
        } else {
            echo "<script>alert('getAllJobs function is not Accessible!')</script>";
        }
        
        $data['recentGigs'] = $this->recentGigs;
        return mysqli_fetch_assoc($data['recentGigs']);
    }

    public function passDataArray(){
        $data['title'] = "SkillSparq";
    }

    
}

?>
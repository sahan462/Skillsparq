<?php

class SellerProfile extends Controller
{
    protected $GigHandlerModel;
    protected $ProfileHandlerModel;
    protected $UserHandlerModel;
    
    protected $userId;
    protected $user;
    protected $userProfile;
    protected $recentGigs;
    protected $data;
    
    public function __construct()
    {
        $this->GigHandlerModel = $this->model('GigHandler');
        $this->ProfileHandlerModel = $this->model('profileHandler');
        $this->UserHandlerModel = $this->model('userHandler');
    }

    public function index(){
        $userId = $_SESSION["userId"];
        $data['UserDetails'] = $this->getUserDets($userId);
        $role = $data['UserDetails']['role'];
        if($role === "Seller"){
            if(isset($_SESSION["phoneNumber"]) && !isset($_SESSION["password"])){

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
                // print_r($data);
                print_r($_SESSION['phoneNumber']);  
                //print_r($_SESSION['gig_id']);
                $this->view('sellerProfile', $data);
            } 
        }else{
            header("location: loginUser");
        }
        
    }

    //get profile information
    public function getSellerDetails($userId){
        $this->userProfile = $this->ProfileHandlerModel->getUserProfile($userId);
        $userProfile = mysqli_fetch_assoc($this->userProfile);
        return $userProfile;
    }

    public function getUserDets($userId){
        $this->user = $this->UserHandlerModel->getUserDetails($userId);
        $user = mysqli_fetch_assoc($this->user);
        return $user;
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
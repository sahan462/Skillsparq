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
    }

    public function index()
    {
<<<<<<< HEAD
        $userId = $_SESSION["userId"];
        $data['SellerUserDetails'] = $this->getSellerUserDetails($userId);
        $role = $data['SellerUserDetails']['role'];
        if($role === "Seller"){
            if(isset($_SESSION["phoneNumber"]) && !isset($_SESSION["password"])){

                header("location: loginUser");
    
            }else{
                $data['var'] = "Seller Profile";
                $data['title'] = "SkillSparq";
                $data["activeStatus"] =  "display: block;";
                $userId = $_SESSION["userId"];
                $gigId = 2;
                $data["sellerProfileDetails"] = $this->getSellerProfileDetails($userId);
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
        
=======
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

>>>>>>> 1c7c664c0defc499396a2252e49a9c18c62f466a
    }

    //get profile information
    public function getSellerProfileDetails($sellerId)
    {
        $userProfile = $this->ProfileHandlerModel->getProfileData($sellerId);
        $userProfile = mysqli_fetch_assoc($userProfile);
        return $userProfile;
    }

<<<<<<< HEAD
    public function getSellerUserDetails($userId){
        $this->user = $this->UserHandlerModel->getUserData($userId);
=======

    public function getUserDets($userId){
        $this->user = $this->UserHandlerModel->getUserDetails($userId);
>>>>>>> 1c7c664c0defc499396a2252e49a9c18c62f466a
        $user = mysqli_fetch_assoc($this->user);
        return $user;
    }

    public function getSellerUserDetails($userId){
        $this->user = $this->UserHandlerModel->getUserData($userId);
        $user = mysqli_fetch_assoc($this->user);
        return $user;
    }

<<<<<<< HEAD
    public function passDataArray()
    {
=======

    public function passDataArray()
    {

>>>>>>> 1c7c664c0defc499396a2252e49a9c18c62f466a
        $data['title'] = "SkillSparq";
    }

    
}

?>
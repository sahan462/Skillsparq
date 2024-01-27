<?php

class SellerProfile extends Controller
{
    protected $GigHandlerModel;
    protected $ProfileHandlerModel;
    protected $UserHandlerModel;
    protected $SellerHandlerModel;
    
    protected $userId;
    protected $sellerId;
    protected $recentGigs;
    protected $data;
    protected $phoneNum;
    
    public function __construct()
    {
        $this->GigHandlerModel = $this->model('GigHandler');
        $this->ProfileHandlerModel = $this->model('profileHandler');
        $this->UserHandlerModel = $this->model('userHandler');
        $this->SellerHandlerModel = $this->model('sellerHandler');
    }

    public function index()
    {

        if(!isset($_SESSION["phoneNumber"]) || !isset($_SESSION["password"])){

            header("location: loginSeller");

        }else{
            $data['var'] = "Seller Profile";
            $data['title'] = "SkillSparq";
            $data["activeStatus"] =  "display: block;";

            $userId = $_SESSION["userId"];
            $phoneNum = $_SESSION['phoneNumber'];

            // $data['sellerId']=$this->getSellerIdFromSellerTable($phoneNum);

            $data["sellerProfileDetails"] = $this->getSellerProfileDetails($userId);

            //get recently added Gigs
            $recentGigs = $this->GigHandlerModel->getGig($userId);
            // not the recent gigs have to get the specific gigs which would be created by the seller.

            if ($recentGigs) {

                $data['recentGigs'] = $recentGigs;
                
            } else {
                echo "<script>alert('getAllJobs function is not Accessible!')</script>";
            }
            
            $data['recentGigs'] = $recentGigs;
            $data['recentGigs'] =mysqli_fetch_assoc($data['recentGigs']);
            print_r($data); 
            $this->view('sellerProfile', $data);
        } 
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

    // get the Seller Id from the Seller Table using Phonenumber
    // public function getSellerIdFromSellerTable($phoneNum)
    // {
    //     $retrievedSellerId = $this->SellerHandlerModel->sellerId($phoneNum);
    //     $retrievedSellerId = mysqli_fetch_assoc($retrievedSellerId);
    //     return $retrievedSellerId;
    // }

}

?>
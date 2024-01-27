<?php
include 'sellerProfile.controller.php';
class EditSellerProfile extends SellerProfile
{
    private $SellerProfileController;

    protected $userId;
    protected $sellerId;
    private $emailAndPassWord;

    public function __construct() {
        // All the model instances are initiated in the sellerProfile controller itself. (GigHandlerModel,ProfileHandlerModel,UserHandlerModel,SellerHandlerModel)
        $this->SellerProfileController = $this->controller('sellerProfile');
    }

    public function index(){
            $data['var'] = "Edit Seller Profile Page";

            // get the userId through session array.
            $userId = $_SESSION["userId"];

            // get the phone number through session variable.
            // $phoneNum =  $_SESSION['phoneNumber'];
            // $data['sellerId'] = $this->SellerHandlerModel->sellerId($phoneNum);

            // get the Seller Profile Details through SellerProfileController.
            $data["sellerProfileDetails"] =$this->SellerProfileController->getSellerProfileDetails($userId);

            // get the Seller User Details through SellerProfileController.
            $data['sellerUserDetails'] = $this->SellerProfileController->getSellerUserDetails($userId);

            // get email and password from the userHandlerModel - user table
            // $data['emailAndPassWord'] = $this->getEmailPassWord($userId);
        
            print_r($data);
            $this->view('editSellerProfile', $data);
    }

    // public function getEmailPassWord($userId){
    //     $this->emailAndPassWord = $this->UserHandlerModel->getEmailAndPassWord($userId);
    //     $emailAndPassWord = mysqli_fetch_assoc($this->emailAndPassWord);
    //     return $emailAndPassWord;
    // }

    public function deleteSellerProfile($userId){
        
    }
}
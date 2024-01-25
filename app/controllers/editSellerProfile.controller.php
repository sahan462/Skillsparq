<?php
include 'sellerProfile.controller.php';
class EditSellerProfile extends SellerProfile
{
    protected $UserHandlerModel;
    protected $SellerHandlerModel;
    private $SellerProfileController;
    protected $userId;
   
    private $emailAndPassWord;

    public function __construct() {
        $this->SellerProfileController = $this->controller('sellerProfile');
        $this->SellerHandlerModel = $this->model('sellerHandler');
        // $this->ProfileHandlerModel = $this->model('profileHandler');
        $this->UserHandlerModel = $this->model('userHandler');
    }

    public function index(){
            $data['var'] = "Edit Seller Profile Page";
            $userId = $_SESSION["userId"];
            $data["userProfile"] =$this->SellerProfileController->getSellerDetails($userId);

            
            // get email and password from the userHandlerModel - user table
            $data['emailAndPassWord'] = $this->getEmailPassWord($userId);
            // get phoneNumber from the sellerHandlerModel - seller table
            //$data['phoneNumber'] = $this->SellerHandlerModel->getPhoneNumber($userId);
            // get 
            // $data['phoneNumber'] = $_SESSION['phoneNumber'];

            print_r($data);
            $this->view('editSellerProfile', $data);
    }

    public function getEmailPassWord($userId){
        $this->emailAndPassWord = $this->UserHandlerModel->getEmailAndPassWord($userId);
        $emailAndPassWord = mysqli_fetch_assoc($this->emailAndPassWord);
        return $emailAndPassWord;
    }

    public function deleteSellerProfile(){
        
    }
}
<?php
include 'sellerProfile.controller.php';
class EditSellerProfile extends SellerProfile
{
    // private $ProfileHandlerModel;
    private $SellerProfileController;
    protected $userId;

    public function __construct() {
        $this->SellerProfileController = $this->controller('sellerProfile');
    }

    public function index(){
            $data['var'] = "Edit Seller Profile Page";
            $userId = $_SESSION["userId"];
            $data["userProfile"] =$this->SellerProfileController->getSellerDetails($userId);
            print_r($data);
            $this->view('editSellerProfile', $data);
        }
}
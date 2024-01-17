<?php

class EditSellerProfile extends Controller
{
    private $ProfileHandlerModel;
    private $SellerProfileController;

    public function __construct() {
        $this->ProfileHandlerModel = $this->model('profileHandler');
        $this->SellerProfileController = $this->controller('sellerProfile');
    }

    public function index(){

        if(!isset($_SESSION["phoneNumber"]) && !isset($_SESSION["password"])) {
            header("location: loginUser");
            exit;
        }else{
            $data['var'] = "Edit Seller Profile Page";
            $data['title'] = "SkillSparq";
            

            $this->SellerProfileController->index();

            $this->view('editSellerProfile', $data);
        }
    }

}
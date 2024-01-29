<?php

class SellerDashboard extends Controller
{
    private $JobHandlerModel;
    private $ProfileHandlerModel;
    public function __construct()
    {   
        $this->JobHandlerModel = $this->model('JobHandler');
        $this->ProfileHandlerModel = $this->model('ProfileHandler');
    }

    public function index()
    {
        if (!isset($_SESSION["phoneNumber"]) || !isset($_SESSION["password"])) {
            header("location: loginSeller");
        } else {

            $data['errors'] = $this->initiate();
            $data['var'] = "SellerDashboard";
            $data['title'] = "SkillSparq";

            

            print_r($_SESSION);
            
            $this->view('SellerDashboard', $data);
        }
    }

    public function initiate()
    {
        // Initialize error array
        $errors = array();
        $errors["password"] = "";
        $errors["email"] = "";
        $errors["agreement"] = "";

        return $errors;
    }
}

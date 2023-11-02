<?php

class SellerDashboard extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {

        // if (!isset($_SESSION["email"]) && !isset($_SESSION["password"])) {
        //     header("location: loginUser");
        // } else {

        //     $data['var'] = "Home Page";
        //     $data['title'] = "SkillSparq";

        //     $this->view('sellerDashboard', $data);
        // }

        $data['errors'] = $this->initiate();
        $data['var'] = "SellerDashboard";
        $data['title'] = "SkillSparq";
        $this->view('SellerDashboard', $data);
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

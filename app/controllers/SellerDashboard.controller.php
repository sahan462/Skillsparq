<?php

class SellerDashboard extends Controller
{

    public function index()
    {

        if (!isset($_SESSION["email"]) && !isset($_SESSION["password"])) {
            header("location: loginSeller");
        } else {

            $data['errors'] = $this->initiate();
            $data['var'] = "SellerDashboard";
            $data['title'] = "SkillSparq";
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

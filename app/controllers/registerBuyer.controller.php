<?php

class RegisterBuyer extends Controller
{

    public function __construct()
    {
        $this->BuyerHandlerModel = $this->model('BuyerHandler');
    }

    public function index(){

        $data['var'] = "Register Buyer Page";
        $data['title'] = "SkillSparq";

        $this->view('registerBuyer', $data);
    }

    public function initiate()
    {
        $errors = array(); 
        $errors["password"] = "";
        $errors["email"] = "";
        $errors["agreement"] = "";

        return $errors;
    }

    public function register(){

        $data['errors']=$errors=$this->initiate();

        if (isset($_POST['register'])) {

            $jobId = 123;
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $userName = $_POST['userName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_confirmation = $_POST['passwordRepeat'];
            $agreement = $_POST['agreement'];

            /*Form Validation*/

            $registerd_email = $this->BuyerHandlerModel->getBuyer($email);

            if ($password != $password_confirmation) {$errors["password"]= "The two passwords are not matched";}
            if ($this->registerModel->userNameCheck($userName)) {$errors["userName"]= "userName already exists";}
            if ($this->registerModel->emailCheck($email)) {$errors["email"]= "email already exists";}
        }
    
        $data['errors']=$errors=$this->initiate();




    }
}
?>
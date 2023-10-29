<?php

class RegisterBuyer extends Controller
{
    private $buyerHandlerModel;
    private $profileHandlerModel;

    public function __construct()
    {
        // Initialize models
        $this->buyerHandlerModel = $this->model('buyerHandler');
        $this->profileHandlerModel = $this->model('profileHandler');
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

    public function index()
    {
        $data['errors'] = $this->initiate();
        $data['var'] = "Register Buyer Page";
        $data['title'] = "SkillSparq";

        // Load the 'registerBuyer' view with data
        $this->view('registerBuyer', $data);
    }

    public function register()
    {
        $data['errors'] = $errors = $this->initiate();
        if (isset($_POST['register'])) {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $userName = $_POST['userName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_confirmation = $_POST['passwordRepeat'];

            if(isset($_POST['agreement'])){
                $agreement = 1;
            }else{
                $errors["agreement"] = "Please check the box to agree to our Terms & Privacy Policy.";
            }

            /* Form Validation */
            if ($password != $password_confirmation) {
                $errors["password"] = "Password confirmation does not match the original password. Please make sure both passwords are the same.";
            }
            if ($this->profileHandlerModel->userNameCheck($userName)) {
                $errors["userName"] = "Username already exists";
            }
            if ($this->buyerHandlerModel->emailCheck($email)) {
                $errors["email"] = "Email is already in use";
            }
        }

        /* Number of validation failures */
        $numberOfErrors = 0;
        foreach ($errors as $key => $value) {
            if (!empty($value)) {
                $numberOfErrors++;
            }
        }

        /* Query in seller/user tables */
        if ($numberOfErrors == 0) {
            // Set session data
            $this->setSession('firstName', $firstName);
            $this->setSession('lastName', $lastName);
            $this->setSession('userName', $userName);
            $this->setSession('email', $email);
            $this->setSession('agreement', $agreement);
            $this->setSession('user_password', password_hash($password . "skillsparq", PASSWORD_DEFAULT));
            $this->setSession('role', "Buyer");
            
            // Redirect to 'verify' page
            $this->redirect('verify');
        } else {
            /* Regenerate registration Page With Errors */
            $data['errors'] = $errors;
            $this->view('registerBuyer', $data);
        }
    }
}
?>

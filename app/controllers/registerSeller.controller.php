<?php

class RegisterSeller extends Controller
{
    private $sellerHandlerModel;
    private $profileHandlerModel;

    public function __construct()
    {
        // Initialize models
        $this->sellerHandlerModel = $this->model('sellerHandler');
        $this->profileHandlerModel = $this->model('profileHandler');
    }

    public function initiate()
    {
        // Initialize error array
        $errors = array();
        $errors["password"] = "";
        $errors["phoneNumber"] = "";
        $errors["agreement"] = "";
        $errors["userName"] = "";

        return $errors;
    }

    public function index()
    {
        $data['errors'] = $this->initiate();
        $data['var'] = "Register Seller Page";
        $data['title'] = "SkillSparq";

        // Load the 'registerSeller' view with data
        $this->view('registerSeller', $data);
    }

    public function register()
    {
        $data['errors'] = $errors = $this->initiate();
        if (isset($_POST['register'])) {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $userName = $_POST['userName'];
            $phoneNumber = $_POST['phoneNumber'];
            $password = $_POST['password'];
            $password_confirmation = $_POST['passwordRepeat'];

            if (isset($_POST['agreement'])) {
                $agreement = 1;
            } else {
                $errors["agreement"] = "Please check the box to agree to our Terms & Privacy Policy.";
            }

            /* Form Validation */
            if ($password != $password_confirmation) {
                $errors["password"] = "Password confirmation does not match the original password. Please make sure both passwords are the same.";
            }
            if (strlen($password) < 8) {
                $errors['password'] = "Password must be at least 8 characters long.";
            }

            if (!preg_match('/[a-z]/', $password)) { // Check for lowercase
                $errors['password'] = isset($errors['password'])
                    ? $errors['password'] . " Must contain at least one lowercase letter."
                    : "Must contain at least one lowercase letter.";
            }

            // Check if the password and confirmation password match
            if ($password !== $password_confirmation) {
                $errors["password"] = isset($errors['password'])
                    ? $errors['password'] . " Confirmation does not match the original password."
                    : "Password confirmation does not match the original password.";
            }

            if ($this->profileHandlerModel->userNameCheck($userName)) {
                $errors["userName"] = "Username already exists";
            }
            if ($this->sellerHandlerModel->phoneNumberCheck($phoneNumber)) {
                $errors["phoneNumber"] = "phoneNumber is already registered";
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
            $this->setSession('phoneNumber', $phoneNumber);
            $this->setSession('agreement', $agreement);
            $this->setSession('user_password', password_hash($password . "skillsparq", PASSWORD_DEFAULT));
            $this->setSession('role', "Seller");

            // Redirect to 'verifySeller' page
            $this->redirect('verifySeller');
        } else {
            /* Regenerate registration Page With Errors */
            $data['errors'] = $errors;
            $this->view('registerSeller', $data);
        }
    }
}

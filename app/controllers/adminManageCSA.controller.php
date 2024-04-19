<?php

class adminManageCSA extends Controller
{
    private $inquiryHandlerModel;
    private $userHandlerModel;
    private $profileHandlerModel;
    public function __construct()
    {
        $this->userHandlerModel = $this->model('userHandler');
        $this->inquiryHandlerModel = $this->model('inquiryHandler');
        $this->profileHandlerModel = $this->model('profileHandler');
    }

    public function index()
    {

        $data['var'] = "adminManageCSA";
        $data['title'] = "SkillSparq";



        $users = $this->userHandlerModel->getUsers();
        $data['users'] = $users;


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_email = $_POST['user_email'];
            $user_password = $_POST['user_password'];
            $role = $_POST['role'];
            $agreement = $_POST['agreement'];
            $userName = $_POST['username'];
            $firstName = $_POST['fname'];
            $lastName = $_POST['lname'];
            $Body = "
            <!DOCTYPE html>
            <html>
            <head>
                <style>
                    .container {
                        font: 400 16px/24px Macan,Helvetica Neue,Helvetica,Arial,sans-serif;
                        background-color: #ffffff;
                        padding: 32px 16px 32px 16px;
                        border-radius: 10px;
                        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                        max-width: 600px;
                        margin: 0 auto;
                    }
                    .header {
                        text-align: center;
                        font-size: 24px;
                        font-weight: bold;
                        margin-bottom: 32px;
                    }
                    .content {
                        font-size: 16px;
                        color: #333;
                    }
                    .methods{
                        margin-top: 16px;
                        margin-bottom: 16px;
                    }
                    p{
                        margin: 0;
                        margin-bottom: 8px;
                    }
                    .btn {
                        display: inline-block;
                        width: 230px;
                        text-align: center;
                        margin-bottom: 16px;
                        padding: 10px 20px;
                        background-color: #4CAF50;
                        color: #fff;
                        border: none;
                        border-radius: 5px;
                        font-size: 16px;
                        text-decoration: none;
                        cursor: pointer;
                    }
                    .otp {
                        background-color: #4CAF50;
                        text-align: center;
                        width: 250px;
                        color: #fff;
                        font-size: 20px;
                        font-weight: bold;
                        border-radius: 5px;
                        display: inline-block;
                        padding: 10px;
                    }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header' style='text-align: center; font-size: 24px; font-weight: bold;'>Welcome to SKILLSPARQ</div>
                    <div class='content' style='font-size: 16px; color: #333;'>
                        <p>Hello $firstName $lastName,</p>
                        <p>Please confirm that you want to use this email address as your SKILLSPARQ $role account email address. You can do it in one of two ways:</p>
                        <div class='methods'>
                            <p>Click the button below to verify your email address:</p>
    
                        <p>Thank you for joining with SKILLSPARQ.</p>
                    </div>
                </div>
            </body>
            </html>
            ";



            $user_id = $this->userHandlerModel->addNewUser($user_email, password_hash($user_password . "skillsparq", PASSWORD_DEFAULT), $role, $agreement);

            $this->profileHandlerModel->addNewProfile($userName, $firstName, $lastName, $user_id);
            $this->sendVerificationMail($user_email, $firstName . " " . $lastName, "Welcome $firstName $lastName", $Body, 'he he');
            $this->profileHandlerModel->lastSeenUpdate(date('Y-m-d H:i:s'), $user_id);
        }



        $this->view('adminManageCSA', $data);
    }
}

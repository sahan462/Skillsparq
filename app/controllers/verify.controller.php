<?php

class Verify extends Controller
{


    private function initializeData() 
    {
        // Initialize data with common values
        $data = [
            'var' => "OTP Verifcation",
            'title' => "SkillSparq",
            'email' => $this->getSession('email'),
            'error' => "",
            'stateInvalid' => "display:none",
            'stateAlready' => "display:none",
            'stateSuccess' => "display:none",
            // Add other data fields here
        ];


        // Retrieve session data
        $data['userName'] = $this->getSession('userName');
        $data['role'] = $this->getSession('role');
        $data['firstName'] = $this->getSession('firstName');
        $data['lastName'] = $this->getSession('lastName');

        return $data;
    }

    public function index()
    {

        $data = $this->initializeData();

        // Get Session DATA //
        $userName = $this->getSession('userName');
        $role = $this->getSession('role');
        $fisrtName = $this->getSession('firstName');
        $lastName = $this->getSession('lastName');
        $data['email'] = $email = $this->getSession('email');
        

        // Create OTP Code
        $otp=rand ( 100000 , 999999 );
        $this->setSession('otpCode', $otp);
        $token=md5($otp);
        $link=BASEURL."verify/submit?userName=".$userName."&token=".$token;

        $subject="Email Confirmation";

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
                    <p>Hello $fisrtName $lastName,</p>
                    <p>Please confirm that you want to use this email address as your SKILLSPARQ $role account email address. You can do it in one of two ways:</p>
                    <div class='methods'>
                        <p>Click the button below to verify your email address:</p>
                        <a href='$link' class='btn' style='padding: 10px 20px; background-color: #31d65a; color: #fff; border: none; border-radius: 5px; font-size: 16px; text-decoration: none; cursor: pointer;'>Verify My Email Address</a>
                        <p>Enter the following OTP to complete the verification:</p>
                        <p class='otp' style='background-color: #31d65a; color: #fff; font-size: 20px; font-weight: bold; border-radius: 5px; display: inline-block; padding: 10px;'>$otp</p>
                    </div>
                    <p>Thank you for joining with SKILLSPARQ.</p>
                </div>
            </div>
        </body>
        </html>
        ";

        $AltBody = "";
    
        // SEND Verification E-Mail
        if((!isset($_GET['userName']) and !isset($_GET['token']) and !isset($_GET['submit'])) or (isset($_GET['resend']) ))
        {
            if($this->sendVerificationMail($email,$fisrtName." ".$lastName,$subject,$Body,$AltBody)){
                echo "
                    <script>
                        alert('Email is Sent');
                    </script>
                ";
                $this->view('verify', $data);
            }
            else{
                $this->unsetSession('otpcode');
                $this->view("505");
            }
    
        }else{
            $this->view("505");
        }

    }
    
    //OTP Submit
    public function submit(){
        
        $data = $this->initializeData();
        $otp_confirmation = false;

        if((isset($_GET['userName']) and isset($_GET['token']))){

            if($_GET['token'] == md5($this->getSession('otpCode'))){
                $otp_confirmation = true;            
            }

        }else if(isset($_GET['submit'])){

            if($_GET['pin'] == $this->getSession('otpCode')){
                $otp_confirmation = true;            
            }

        }else{

            if(isset($_GET['resend'])){
                $this->redirect('verify');
            }

        }

        if($otp_confirmation){

            try {

                $password = $this->getSession('user_password');
                $agreement = $this->getSession('agreement');
                $role = $this->getSession('role');
                $email = $this->getSession('email');
                $userName = $this->getSession('userName');
                $firstName = $this->getSession('firstName');
                $lastName = $this->getSession('lastName');
            
                $this->userHandlerModel = $this->model('userHandler');
                $this->buyerHandlerModel = $this->model('buyerHandler');
                $this->profileHandlerModel = $this->model('profileHandler');
            
                $user_id = $this->userHandlerModel->addNewUser($email, $password,$role, $agreement);
                $this->buyerHandlerModel->addNewBuyer($user_id);
                $this->profileHandlerModel->addNewProfile($userName, $firstName, $lastName, $user_id);

                $otp_confirmation = false;

                $this->unsetSession('email');

                $data["stateSuccess"] = "";
                $this->view("verify",$data); 

            } catch (Exception $e) {

                echo 'An error occurred: ' . $e->getMessage();

            }
            
        }else{

            $data["stateInvalid"] = "";
            $this->view("verify",$data); 

        }
    }
}


?>
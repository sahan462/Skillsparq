<?php

class VerifySeller extends Controller
{

    private function initializeData() {
        // Initialize data with common values
        $data = [
            'var' => "OTP Verifcation",
            'title' => "SkillSparq",
            'phoneNumber' => $this->getSession('phoneNumber'),
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

    public function index(){

        $data = $this->initializeData();

        // Get Session DATA //
        $fisrtName = $this->getSession('firstName');
        $lastName = $this->getSession('lastName');
        $data['phoneNumber'] = $phoneNumber = $this->getSession('phoneNumber');
        

        // Create OTP Code
        $otp=rand ( 100000 , 999999 );
        $this->setSession('otpCode', $otp);

        //message body
        $body = "your skillsparq verification OTP is $otp";

        // SEND Verification E-Mail
        if(!isset($_GET['submit']) or (isset($_GET['resend']) ))
        {

            if($this->sendVerificationMessage(trim($phoneNumber,'+'), $fisrtName, $lastName, $body)){

                echo "
                    <script>
                        alert('Message is Sent');
                    </script>
                ";
                $this->view('verifySeller', $data);
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

        if(isset($_GET['submit'])){
            if($_GET['pin'] == $this->getSession('otpCode')){
                $otp_confirmation = true;            
            }

        }else{

            if(isset($_GET['resend'])){
                $this->redirect('verifySeller');
            }

        }

        if($otp_confirmation){

            $fisrtName = $this->getSession('firstName');
            $lastName = $this->getSession('lastName');

            try {

                $password = $this->getSession('user_password');
                $agreement = $this->getSession('agreement');
                $role = $this->getSession('role');
                $phoneNumber = $this->getSession('phoneNumber');
                $userName = $this->getSession('userName');
            
                $this->userHandlerModel = $this->model('userHandler');
                $this->sellerHandlerModel = $this->model('sellerHandler');
                $this->profileHandlerModel = $this->model('profileHandler');
            
                $user_id = $this->userHandlerModel->addNewSeller($password, $role, $agreement);
                $this->sellerHandlerModel->addNewSeller($user_id, $phoneNumber);
                $this->profileHandlerModel->addNewProfile($userName, $fisrtName, $lastName, $user_id);

                $otp_confirmation = false;

                $this->unsetSession('phoneNumber');

                $data["stateSuccess"] = "";
                $this->view("verifySeller",$data); 

            } catch (Exception $e) {

                echo 'An error occurred: ' . $e->getMessage();

            }
            
        }else{

            $data["stateInvalid"] = "";
            $this->view("verifySeller",$data); 
            
        }
    }
}


?>
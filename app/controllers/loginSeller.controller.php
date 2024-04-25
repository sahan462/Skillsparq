<?php
//login controller for Seller
class LoginSeller extends Controller
{
    private $loginHandler;
    private $profileHandler;
    public function __construct()
    {
        $this->loginHandler = $this->model('LoginHandler');
        $this->profileHandler = $this->model('ProfileHandler');
    }

    public function index(){

        $data['var'] = "Login Page";
        $data['title'] = "SkillSparq";

        $errors = array();         
        $errors["phoneNumber"] = "";
        $errors["password"] = "";
        $data['errors'] = $errors;

        $this->view('loginSeller', $data);

    }

    public function validate(){

        $errors["phoneNumber"] = "";
        $errors["password"] = "";


        if(isset($_POST["login"]) ){

            $phoneNumber = $_POST["phoneNumber"];
            $password = $_POST["password"];

            if($Seller = $this->loginHandler->phoneNumberCheck($phoneNumber)){
                $SellerId = $Seller['seller_id'];
                $row = $this->loginHandler->sellerCheck($SellerId, $password);

                if($row){

                    $_SESSION["userId"] = $row['user_id'];
                    $_SESSION["phoneNumber"] = $Seller['phone_number'];
                    $_SESSION['password'] = $row['user_password'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['firstName'] = $row['first_name'];
                    $_SESSION['lastName'] = $row['last_name'];
                    $_SESSION['userName'] = $row['user_name'];
                    $_SESSION['status'] = "online";

                    $profile = mysqli_fetch_assoc($this->profileHandler->getProfPic($row['user_id']));
                    $_SESSION['profilePicture'] = $profile['profile_pic'];

                    $lastSeenUpdate = $this->profileHandler->lastSeenUpdate("online", $row['user_id']);

                    if($lastSeenUpdate){

                        header("location: /skillsparq/public/sellerdashboard");

                    }else{

                        echo "<script> alert('Error updating last seen'); </script>";
                        header("location: /skillsparq/public/login");
                    }

        
                }else{

                    $errors["password"] = "Incorrect password";
                    $data["errors"] = $errors;
                    $this->view("loginSeller", $data);

                }



            }else{

                $errors["email"]="Email is not found";
                $data["errors"] = $errors;
                $this->view("loginSeller", $data);

            }




        }else{

            $errors["email"] = "";
            $errors["password"] = "";
            $data['errors'] = $errors;

            $this->view("505", $data);
        }



    }


    public function logout(){

        date_default_timezone_set('UTC');
        $dateTime = new DateTime();
        $currentDateTime = $dateTime->format('m/d/Y h:i:s a');

        $lastSeenUpdate = $this->profileHandler->lastSeenUpdate($currentDateTime, $_SESSION['userId']);

        if ($lastSeenUpdate) {

            session_destroy();
            echo "
            <script>
                alert('Logged Out Successfully');
                window.location.href = '" . BASEURL . "home';
            </script>
        ";
        } else {

            echo "<script> alert('Error updating last seen'); </script>";
            header("location: /skillsparq/public/helpCenter");
        }
        
    }


}

?>
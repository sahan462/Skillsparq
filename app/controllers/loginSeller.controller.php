<?php
//login controller for Seller
class LoginSeller extends Controller
{

    public function __construct()
    {
        $this->loginHandler = $this->model('LoginHandler');
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
                    $_SESSION['role'] = $role =$row['role'];

                    if($role == 'Buyer'){
                        header("location: /skillsparq/public/buyerdashboard");
                    }else if($role == "Seller"){
                        header("location: /skillsparq/public/sellerdashboard");
                    }else if($role == "Admin"){
                        header("location: /skillsparq/public/adminDashboard");
                    }else if($role == "Customer Support Assistant"){
                        header("location: /skillsparq/public/helpCenterDashobard");
                    }else{
                        echo "<script>alert('Invalid')</script>";
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
        session_destroy();
        echo "
        <script>
            alert('Logged Out Successfully');
            window.location.href = '" . BASEURL . "home';
        </script>
    ";
        
    }


}

?>
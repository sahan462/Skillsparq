<?php
//login controller for buyer, 
class LoginUser extends Controller
{

    public function __construct()
    {
        $this->loginHandler = $this->model('LoginHandler');
    }

    public function index(){

        $data['var'] = "Login Page";
        $data['title'] = "SkillSparq";

        $errors = array();         
        $errors["email"] = "";
        $errors["password"] = "";
        $data['errors'] = $errors;

        $this->view('loginUser', $data);

    }

    public function validate(){

        $errors["email"] = "";
        $errors["password"] = "";


        if(isset($_POST["login"]) ){

            $email = $_POST["email"];
            $password = $_POST["password"];

            if($this->loginHandler->emailCheck($email)){

                $row = $this->loginHandler->userCheck($email, $password);

                if($row){

                    $_SESSION["userId"] = $row['user_id'];
                    $_SESSION["email"] = $row['user_email'];
                    $_SESSION['password'] = $row['user_password'];
                    $_SESSION['role'] = $role =$row['role'];

                    if($role == 'Buyer'){
                        header("location: /skillsparq/public/buyerdashboard");
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
                    $this->view("loginUser", $data);

                }



            }else{

                $errors["email"]="Email is not found";
                $data["errors"] = $errors;
                $this->view("loginUser", $data);

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
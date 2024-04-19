<?php
//login controller for buyer, 
class LoginUser extends Controller
{

    private $loginHandler;
    private $profileHandler;
    public function __construct()
    {
        $this->loginHandler = $this->model('LoginHandler');
        $this->profileHandler = $this->model('ProfileHandler');
    }

    public function index()
    {

        $data['var'] = "Login Page";
        $data['title'] = "SkillSparq";

        $errors = array();
        $errors["email"] = "";
        $errors["password"] = "";
        $data['errors'] = $errors;

        $this->view('loginUser', $data);
    }

    public function validate()
    {

        $errors["email"] = "";
        $errors["password"] = "";


        if (isset($_POST["login"])) {

            $email = $_POST["email"];
            $password = $_POST["password"];

            if ($this->loginHandler->emailCheck($email)) {

                $row = $this->loginHandler->userCheck($email, $password);


                if ($row) {

                    $_SESSION["userId"] = $row['user_id'];
                    $_SESSION["email"] = $row['user_email'];
                    $_SESSION['password'] = $row['user_password'];
                    $_SESSION['role'] = $role = $row['role'];


                    $lastSeenUpdate = $this->profileHandler->lastSeenUpdate("online", $row['user_id']);


                    if ($lastSeenUpdate) {

                        $profile = mysqli_fetch_assoc($this->profileHandler->getUserProfile($row['user_id']));
                        $_SESSION['firstName'] = $profile['first_name'];
                        $_SESSION['lastName'] = $profile['last_name'];
                        $_SESSION['userName'] = $profile['user_name'];
                        $_SESSION['profilePicture'] = $profile['profile_pic'];
                        $data['profile'] = $profile;

                        if ($role == 'Buyer') {
                            header("location: /skillsparq/public/buyerDashboard");
                        } else if ($role == "Admin") {
                            header("location: /skillsparq/public/adminDashboard");
                        } else if ($role == "csa") {
                            header("location: /skillsparq/public/helpDeskCenter");
                        } else {
                            echo "<script>alert('Invalid')</script>";
                        }
                    } else {

                        echo "<script> alert('Error updating last seen'); </script>";
                        header("location: /skillsparq/public/login");
                    }
                } else {

                    $errors["password"] = "Incorrect password";
                    $data["errors"] = $errors;
                    $this->view("loginUser/index", $data);
                }
            } else {

                $errors["email"] = "Email is not found";
                $data["errors"] = $errors;
                $this->view("loginUser/index", $data);
            }
        } else {

            $errors["email"] = "";
            $errors["password"] = "";
            $data['errors'] = $errors;

            $this->view("505", $data);
        }
    }


    public function logout()
    {
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

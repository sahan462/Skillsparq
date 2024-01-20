<?php

class BuyerDashboard extends Controller
{
    private $GigHandlerModel;
    public function __construct()
    {
        $this->GigHandlerModel = $this->model('GigHandler');
    }

    public function index()
    {

        if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])){

            header("location: loginUser");

        }else{

            $data['var'] = "Home Page";
            $data['title'] = "SkillSparq";

            //get recently added Gigs
            $recentGigs = $this->GigHandlerModel->getRecentGigs();

            if ($recentGigs) {

                $data['recentGigs'] = $recentGigs;
                
            } else {
                echo "<script>alert('getAllJobs function is not Accessible!')</script>";
            }
            
            $data['recentGigs'] = $recentGigs;
    
            print_r(mysqli_fetch_assoc($data['recentGigs']));

            //get top rated Gigs
            


            //get newbie gigs
            


            $this->view('buyerdashboard', $data);

        }

    }

}

?>
<?php
class ProfilePic extends Controller
{
    public $ProfileHandlerModel;
    
    public function __construct()
    {
        $this->ProfileHandlerModel = $this->model('profileHandler');
    }

    public function index()
    {
        $uId = $_SESSION['userId'];
        $profilePic = $this->ProfileHandlerModel->getProfPic($uId);
        $profilePic = mysqli_fetch_assoc($profilePic);
        print_r($profilePic);
    }
}
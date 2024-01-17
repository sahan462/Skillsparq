<?php

class EditProfile extends Controller
{
    private $ProfileHandlerModel;
    private $UserHandlerModel;

    public function __construct() {
        $this->ProfileHandlerModel = $this->model('profileHandler');
        $this->UserHandlerModel = $this->model('userHandler');
    }

    public function index(){
        

        // if()

        $data['var'] = "Edit Profile Page";
        $data['title'] = "SkillSparq";

        $this->view('editProfile', $data);
    }

}

?>
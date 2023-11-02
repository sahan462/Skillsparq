<?php

class EditProfile extends Controller
{

    public function index(){

        $data['var'] = "Home Page";
        $data['title'] = "SkillSparq";

        $this->view('editProfile', $data);
    }

}

?>
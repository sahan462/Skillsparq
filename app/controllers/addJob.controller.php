<?php

class AddJob extends Controller
{

    public function index(){

        $data['var'] = "AddJob";
        $data['title'] = "SkillSparq";

        $this->view('addJob', $data);
    }


    private function getJob(){
        
    }

    private function addJob(){

    }

    private function updateJob(){
        
    }

    private function deleteJob(){
        
    }




}

?>
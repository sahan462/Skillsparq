<?php

class Search extends Controller
{

    public function __construct(){
        
    }

    public function index(){

        if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])) {

            header("location: loginUser");

        }else{

            $data['var'] = "Search";
            $data['title'] = "SkillSparq";

            $this->view('home', $data);

        }
    }

}



?>
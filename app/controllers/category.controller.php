<?php

class Category extends Controller
{

    
    public function __construct()
    {
        $this->GigHandlerModel = $this->model('GigHandler');
    }
    public function index(){


        $data['var'] = "About";
        $data['title'] = "SkillSparq";

        if(isset($_GET['type'])){
            $category = $_GET['type'];
            $categoryGigs = $this->GigHandlerModel->getCategoryGigs($category);
            $data['categoryGigs'] = $categoryGigs;
        }

        $data['Title'] = $category;

        $this->view('Category', $data);



    }
}

?>
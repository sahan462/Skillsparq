<?php

class complaints extends Controller
{



    public function index()
    {

        $data['var'] = "complaints";
        $data['title'] = "SkillSparq";
        $this->view('complaints', $data);
    }
}

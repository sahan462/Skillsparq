<?php

class viewComplaints extends Controller
{



    public function index()
    {

        $data['var'] = "viewComplaints";
        $data['title'] = "SkillSparq";
        $this->view('viewComplaints', $data);
    }
}

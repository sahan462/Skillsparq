<?php

class SendJobProposals extends Controller
{
    private $JobHandlerModel;
    
    public function __construct()
    {
        $this->JobHandlerModel = $this->model('JobHandler');
    }

    public function index()
    {
        $data['var'] = "send Job Proposals Page";
        $data['title'] = "SkillSparq";
    }
}
<?php

class Chat extends Controller
{

    public function index(){

        $data['var'] = "Chat";
        $data['title'] = "SkillSparq";

        $this->view('chat', $data);
    }

}

?>
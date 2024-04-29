<?php

class viewChats extends Controller
{

    private $profileHandlerModel;

    public function __construct()

    {

        $this->profileHandlerModel = $this->model('profileHandler');
    }
    public function index()
    {

        $data['var'] = "viewChats";
        $data['title'] = "SkillSparq";
        $order_id = isset($_GET['order_id']) ? $_GET['order_id'] : null;
        $buyer_id = isset($_GET['buyer_id']) ? $_GET['buyer_id'] : null;
        $seller_id = isset($_GET['seller_id']) ? $_GET['seller_id'] : null;
        $viewChat = $this->profileHandlerModel->viewChat($order_id);
        $data['buyer_id'] = $buyer_id;
        $data['seller_id'] = $buyer_id;
        $data['viewChat'] = $viewChat;
        $data['order_id'] = $order_id;
        $this->view('viewChats', $data);
    }
}

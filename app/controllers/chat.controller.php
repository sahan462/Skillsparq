<?php

class Chat extends Controller
{

    public function __construct(){
        $this->ChatHandlerModel = $this->model('chatHandler');
    }

    public function index(){

        $data['var'] = "Chat";
        $data['title'] = "SkillSparq";

        $this->view('chat', $data);
    }

    //send new text message
    public function sendNewTextMessage(){

        try{

            // Read the JSON data sent via POST and decode it into a PHP associative array
            $jsonData = file_get_contents('php://input');
            $messageData = json_decode($jsonData, true);
    
            // Extract the message fields from the associative array
            $message = $messageData['message'];
            $date = date("Y-m-d H:i:s");
            $chatId = $messageData['chatId'];
            $senderId = $messageData['senderId'];
            $receiverId = $messageData['receiverId'];

            $isSent = $this->ChatHandlerModel->sendNewTextMessage($message, $date, $chatId, $senderId, $receiverId);
    
            // Return JSON response
            header('Content-Type: application/json');
            echo json_encode(array('success' => $isSent));
    
        } catch(Exception $e){
    
            // Handle exception
            header('Content-Type: application/json');
            echo json_encode(array('error' => $e->getMessage()));
    
        }
    }
    

}

?>
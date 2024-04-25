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
            $attachement = $messageData['attachment'];
            $date = date("Y-m-d H:i:s");
            $chatId = $messageData['chatId'];
            $senderId = $messageData['senderId'];
            $receiverId = $messageData['receiverId'];

            $isSent = $this->ChatHandlerModel->sendNewTextMessage($message, $attachement, $date, $chatId, $senderId, $receiverId);
    
            // Return JSON response
            header('Content-Type: application/json');
            echo json_encode(array('success' => $isSent));
    
        } catch(Exception $e){
    
            // Handle exception
            header('Content-Type: application/json');
            echo json_encode(array('error' => $e->getMessage()));
    
        }
    }

    function saveMessage(){

        try{    
            // Extract the message fields from the associative array
            $message = $_POST['newMessage'];
            if(isset($_POST['attachement'])){
                $attachement = $_POST['attachement'];
            }else{
                $attachement = "";
            }
            $date = date("Y-m-d H:i:s");
            $chatId = $_POST['chatId'];
            $senderId = $_POST['senderId'];
            $receiverId = $_POST['receiverId'];
  
            $isSent = $this->ChatHandlerModel->sendNewTextMessage($message, $attachement, $date, $chatId, $senderId, $receiverId);
            if($isSent){
                return true;
            }
            return true;
    
        } catch(Exception $e){
    
            // Handle exception
            header('Content-Type: application/json');
            echo json_encode(array('error' => $e->getMessage()));
    
        }

    }
    
}

?>
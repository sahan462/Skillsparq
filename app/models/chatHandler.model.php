<?php
class ChatHandler extends database
{

        //create new chat
        public function createNewChat($chatType, $typeId) //typeid is either order id or inquiry id
        {
            if($chatType == 'order')
            {

                $stmt = mysqli_prepare($GLOBALS['db'], "INSERT INTO chats 
                (
                    order_id
                ) 
                VALUES 
                (
                    ?
                )");

            }else if($chatType == 'inquiry')
            {

                $stmt = mysqli_prepare($GLOBALS['db'], "INSERT INTO chats 
                (
                    inquiry_id
                ) 
                VALUES 
                (
                    ?
                )");

            }
                    
            if ($stmt === false) {
                throw new Exception("Failed to create prepared statement.");
            }
    
            mysqli_stmt_bind_param($stmt, "i", $typeId);
    
            if (mysqli_stmt_execute($stmt)) {
                $chatId = mysqli_insert_id($GLOBALS['db']);
                $stmt->close();
            } else {
                throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
            }

            return $chatId;

        }

        //send new message
        public function sendNewTextMessage($meesage, $date, $chatId, $senderId, $receiverId)
        {
            $stmt = mysqli_prepare($GLOBALS['db'], "INSERT INTO messages 
            (
                message, 
                date, 
                chat_id,
                sender_id,   
                receiver_id
            ) 
            VALUES 
            (
                ?, ?, ?, ?, ?
            )");
        
            if ($stmt === false) {
                throw new Exception("Failed to create prepared statement.");
            }
    
            mysqli_stmt_bind_param($stmt, "ssiii", $meesage, $date, $chatId, $senderId, $receiverId);
    
            if (mysqli_stmt_execute($stmt)) {
                $stmt->close();
            } else {
                throw new Exception("Error inserting data: " . mysqli_error($GLOBALS['db']));
            }

            return true;
    
        }


        //read Messages
        public function readMessages($chat_id, $sender_id, $receiver_id)
        {
            $query = "SELECT * FROM messages where chat_id = ? and sender_id = ? and receiver_id = ?";

            $stmt = mysqli_prepare($GLOBALS['db'], $query);
        
            if (!$stmt) {
                die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
            }
    
            mysqli_stmt_bind_param($stmt, "iii", $chat_id, $sender_id, $receiver_id);
    
            if (mysqli_stmt_execute($stmt)) {
                return $stmt->get_result();
            } else {
                die('MySQL Error: ' . mysqli_error($GLOBALS['db']));
            }
        }


}

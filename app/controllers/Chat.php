<?php
namespace MyApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

// require_once "app\models\chatHandler.model.php";
// require "app\core\config.php";
// require "app\core\functions.php";
// require "app\core\database.php";
// require "app\core\controller.php";

class Chat implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
        // $this->ChatHandlerModel = new \ChatHandler;
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        $querystring = $conn->httpRequest->getUri()->getQuery();
        parse_str($querystring, $queryarray);

        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {

        $numRecv = count($this->clients) - 1;
        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        $data = json_decode($msg, true);

        if($data['command'] == 'private'){

            //private chat
            $newMessage = $data['newMessage'];
            $date = date('Y-m-d H:i:s');
            $chatId = $data['chatId'];
            $senderId = $data['senderId'];
            $receiverId = $data['receiverId'];


            // Check if attachment exists
            if (isset($data['attachment'])) {
                $attachment = $data['attachment'];
            }else{
                $attachment = null;
            }

            $url = 'http://localhost/skillsparq/public/Chat/saveMessage';

            // Data to be sent in the POST request
            // $data = array (
            //     'senderId' => $data['senderId'],
            //     'receiverId' => $data['receiverId'],
            //     'message' => $data['newMessage'],
            // );
    
            // Initialize cURL session
            $curl = curl_init();
    
            // Set cURL options
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
            // Execute cURL request
            $response = curl_exec($curl);
    
            // Close cURL session
            curl_close($curl);
    
            // Handle response
            echo $response;

        }else{

            echo "Public Chat Error";

        }

        foreach ($this->clients as $client) {

            if ($from !== $client) {
                // The sender is not the receiver, send to each client connected
                $data['from'] = $client->resourceId;
            }else{
                $data['from'] = 'Me';
            }

            $client->send(json_encode($data));
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../app/vendor/phpmailer/src/Exception.php';
require '../app/vendor/phpmailer/src/PHPmailer.php';
require '../app/vendor/phpmailer/src/SMTP.php';


class Controller
{
    // Loads a view with optional data
    public function view($view, $data = [])
    {
        extract($data);

        $filename = "../app/views/" . $view . ".view.php";
        if (file_exists($filename)) {
            require $filename;
        } else {
            echo "Could not find view file: " . $filename;
        }
    }

    // Loads a model and returns an instance
    public function model($modelName)
    {
        if (file_exists("../app/models/" . $modelName . ".model.php")) {
            require_once "../app/models/$modelName.model.php";
            $modelName = ucfirst($modelName);
            return new $modelName;
        } else {
            echo "<div style='margin:0;padding:10px;background-color:silver;'> $modelName.model.php file not found </div>";
        }
    }

    // Loads a Controller and returns an instance
    public function controller($controllerName)
    {
        if (file_exists("../app/controllers/" . $controllerName . ".controller.php")) {
            require_once "../app/controllers/$controllerName.controller.php";
            $controllerName = ucfirst($controllerName);
            return new $controllerName;
        } else {
            echo "<div style='margin:0;padding:10px;background-color:silver;'> $controllerName.model.php file not found </div>";
        }
    }

    // Retrieves input data from POST or GET requests
    public function input($inputName)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == 'post') {
            return trim(strip_tags($_POST[$inputName]));
        } else if ($_SERVER['REQUEST_METHOD'] == 'GET' || $_SERVER['REQUEST_METHOD'] == 'get') {
            return trim(strip_tags($_GET[$inputName]));
        }
    }

    // Session management methods

    // Set session
    public function setSession($sessionName, $sessionValue)
    {
        if (!empty($sessionName) && !empty($sessionValue)) {
            $_SESSION[$sessionName] = $sessionValue;
        }
    }

    // Get session
    public function getSession($sessionName)
    {
        if (!empty($sessionName)) {

            if(isset($_SESSION[$sessionName])) {

                return $_SESSION[$sessionName];

            }

        }
    }

    // Unset session
    public function unsetSession($sessionName)
    {
        if (!empty($sessionName)) {
            unset($_SESSION[$sessionName]);
        }
    }

    // Destroy sessions
    public function destroy()
    {
        session_destroy();
    }

    // Redirection method
    public function redirect($path)
    {
        header("location:" . BASEURL . $path);
    }

    //send mail
    public function sendVerificationMail($receiver_email, $receiver_name, $subject, $body, $AltBody){
        
        $mail = new PHPMailer(true);

        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'skillsparq@gmail.com'; // SMTP username
            $mail->Password = 'dyaboyjlwfykpnip'; // SMTP password
            $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, 'ssl' also accepted
            $mail->Port = 465; // TCP port to connect to
            $mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                )
            );

            // Sender and recipient
            $mail->setFrom('skillsparq@gmail.com', 'Team SKILLSPARQ');
            $mail->addAddress($receiver_email, $receiver_name);

            // Email content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AltBody = $AltBody;

            $mail->send();

            echo 
            "
            <script>
                <alert>E mail Sent Successfully</alert>
            </script>
            ";

            // Email sent successfully
            return true;
        } catch (Exception $e) {
            // Email could not be sent
            return false;
        }

    }

    public function sendVerificationMessage($receiverPhoneNumber, $receiverFirstName, $receiverLastName, $body){

        require_once('../app/vendor/nofity/autoload.php');

        $api_instance = new NotifyLk\Api\SmsApi();
        $user_id = "25927"; 
        $api_key = "x3wmckBRcglZBwtzamHm";
        $message = $body; 
        $to = $receiverPhoneNumber; 
        $sender_id = "NotifyDEMO"; 
        $contact_fname = $receiverFirstName; 
        $contact_lname = $receiverLastName; 
        $contact_email = ""; 
        $contact_address = ""; 
        $contact_group = 0; 
        $type = null; 
        
        try {
            $api_instance->sendSMS($user_id, $api_key, $message, $to, $sender_id, $contact_fname, $contact_lname, $contact_email, $contact_address, $contact_group, $type);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}

?>

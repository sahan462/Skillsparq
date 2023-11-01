<?php

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
            return $_SESSION[$sessionName];
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
        // header("location:" . BASEURL . $path);
    }
}

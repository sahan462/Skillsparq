<?php

class Controller
{

    public function view($view, $data = []){

        extract($data);

        $filename = "../app/views/".$view.".view.php";
        if(file_exists($filename)){
            require $filename;
        }else{
            echo "could not find view file: ". $filename;
        }

    }

    public function model($modelName){
 
        if(file_exists("../app/models/" . $modelName . ".model.php")){
  
          require_once "../app/models/$modelName.model.php";
          return new $modelName;
  
        } else {
          echo "<div style='margin:0;padding: 10px;background-color:silver;'> $modelName.model.php file not found </div>";
        }
  
     }



}

?>
<?php

$routes = [
    // route => [ controller, method]
    'seller' => [
        'gigs' => [
            'GET' => [
                '/' => [
                    'controller' => 'GigController', 
                    'method' => 'index', 
                    'middleware' => 'auth'
                ],
                'id' => ['GigController', 'show']
            ],
            'POST' => [
                'create' => ['GigController', 'store'],
            ],
            'PATCH' => [
                'id' => ['GigController', 'update']
            ]
        ]
    ]
];

// in app.php

// function __construct()
//     {
//         $arr = $this->getURL();

//         require 'route.php';

//         $requestMethod = $_SERVER['REQUEST_METHOD'];

//         if (array_key_exists($arr[0], $routes)) {
//             if (array_key_exists($requestMethod, $routes[$arr[0]])) {
//                 if (empty($arr[1])) {
//                     $route = $routes[$arr[0]][$requestMethod]['/'];
//                 } else {
//                     $route = $routes[$arr[0]][$requestMethod]['id'];
//                 }
//             } else {
//                 echo "405";
//                 exit;
//             }
//         } else {
//             echo "404";
//             exit;
//         }

//         print_r($route);
//         die;
//         $filename = "../app/controllers/".ucfirst($arr[0]).".controller.php";

//         if(file_exists($filename)){
//             require $filename;
//             $this->controller = $arr[0];
//             unset($arr[0]);
//         }else{
//             require "../app/controllers/".$this->controller.".controller.php";
//         }
//         $mycontroller = new $this->controller();
//         $mymethod = $arr[1] ?? $this-> method;

//         if(!empty($arr[1]) && method_exists($mycontroller, strtolower($arr[1]))) {
//             $this->method = strtolower($mymethod);
//             unset($arr[1]);
//         }

//         $arr = array_values($arr);
//         call_user_func_array([$mycontroller, $this->method], $arr);
//     }

//     private function getURL() 
//     {
//         $url = isset($_GET['url']) ? $_GET['url'] : "not found";
//         $arr = explode("/", $url);
//         return $arr;
//     }
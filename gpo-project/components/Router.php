<?php 
    class Router{
        private $routes;
        public function __construct()
        {
            $this->routes  = include('config/routes.php');
        }
        
        //метод возращает строку
        private function getURI(){
             //empty проверяет не пуста ли переменная
            if(!empty($_SERVER['REQUEST_URI']))
                return trim($_SERVER['REQUEST_URI'], '/');
        }
        
        public function run(){
            //Подключаем строку запроса 
           
            $uri = $this->getURI();
    
            foreach($this->routes as $uriPattern => $path){
                //проверяем наличие такого запроса в routes.php
                if(preg_match("~$uriPattern~", $uri)){
//                    echo $uriPattern;
                    $internalRoute = preg_replace("~$uriPattern~",$path,$uri);
                    
                    $segment = explode('/',$internalRoute);
                    unset($segment[0]);
                    unset($segment[1]);
                    $controllerName = array_shift($segment).'Controller';
                    
                    $controllerName = ucfirst($controllerName);
                    
                    $actionName = 'action'.ucfirst(array_shift($segment));
                    $parameters = $segment;
//                    print_r($parameters);
//                    echo '<br>Controller Name: '.$controllerName;
//                    echo '<br>action Name: '.$actionName.'<br>';
                    $controllerFile = 'controllers/'.$controllerName.'.php';
                    if(file_exists($controllerFile)){
                        include_once($controllerFile);
                    }
                    $controllerObject = new $controllerName;
//                    $result = $controllerObject->$actionName($segment);
                    $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                    if($result != null){
                        break;
                    }
                }
            }
        }
    }
?>
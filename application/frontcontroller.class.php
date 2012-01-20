<?php
class FrontController {
    private $action;
    private $controller;


    public function __construct() {
        $this -> action = isset($_GET["action"]) ? strtolower($_GET["action"]) : "index";
        $this -> controller = isset($_GET["site"]) ? strtolower($_GET["site"]) : "index";

        $this -> controller .= 'Controller';
        $this -> action .= 'Action';
    }

    public function run() {
        if($this -> checkController($this->controller)) {
            $controller = new $this->controller;
        }
        else {
            $controller = new errorController();
            $this -> action = 'indexAction';
        }
        

        if(in_array($this->action, get_class_methods($controller))) {
            $action = $this -> action;
        }
        else {
            $action = 'errorAction';
        }
        
        $content = $controller->{$action}();
        if(isset($_GET['noindex'])) echo $content;
        else {
            $template = new Template('templates', 'index.tpl');
            
            $template -> addVariable('content', $content)
                          -> _loadTemplate();          
            echo $template -> _run();
        }

    }
    

    private function checkController($class_name) {
        $class_name = strtolower($class_name);
        
        $path = 'application/controller/'.$class_name.'.php';
        
        if(file_exists($path)) {
            return true;
        }
        return false;
    }
}

?>
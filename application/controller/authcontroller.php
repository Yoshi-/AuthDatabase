<?php
class authController extends baseController
{
    private $model;
    private $view;
    public function __construct()
    {
        $this->model = new authModel();
        $this->view  = new authView();
    }
    
    public function indexAction()
    {
        if (isset($_GET['authID'])) {
            $auth = $this->model->getAuth($_GET['authID']);
            return $this->view->showAuth($auth);
        } else
            return 'No Auth selected';
    }
    public function errorAction()
    {
        return $this->indexAction();
    }
}
<?php

namespace btcbe\mvc\controller;

use Twig_Loader_Filesystem;
use Twig_Environment;

use freest\router\Router as Router;
use btcbe\mvc\model\BusinessModel;
/* 
 * Controller.php
 */

class Controller 
{
    protected $model;
    protected $view;
    protected $twig;
    protected $twigarr;
    
    protected $db;
    
    protected $router;
    
    public function __construct() 
    {
        // firing up Twig
        $loader = new Twig_Loader_Filesystem(ROOT_URL.'src/mvc/view/');
        $this->twig = new Twig_Environment($loader, array('cache' => false));
        $this->twigarr_init();    
        // router
        $this->startRouter();
    }
    
    protected function setView(View $view) 
    {
        $this->view = $view;
    }
    
        protected function startRouter() 
    {        
        $router = new Router();
        $router->route('',          '0');
        $router->route('index.php', '0');
        $router->route('business',  '1');
        $this->router = $router;
    }
    private function twigarr_init()
    {        
        $this->twigarr['site_title'] = SITE_TITLE;
        $this->twigarr['www'] = WWW;
        $this->twigarr['countries'] = BusinessModel::countriesList();
        $this->twigarr['categories'] = BusinessModel::categoriesList();
    }
    
    
    public function invoke() 
    {
        if ($this->router->get() == '1') {
            $gc = new BusinessController();
            $gc->invoke();
        }
        else {
            $this->front();
        }
    }
    
    protected function front() {
        $template = $this->twig->load('front.twig');
        //$this->twigarr['businesses'] = BusinessModel::businessObjsArr();
        $this->twigarr['businesses'] = BusinessModel::newestBusinesses();
        echo $template->render($this->twigarr);
        // change this to 
        //      Latest Business Added
        //      Country Lookup
        //      Add New Business button
        
    }
    
    protected function warning($message) 
    {
        $template = $this->twig->load('warning.twig');
        $this->twigarr['message'] = $message; 
        echo $template->render($this->twigarr);                
            
    }
}

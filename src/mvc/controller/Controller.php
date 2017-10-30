<?php

namespace jochen\mvc\controller;

use Twig_Loader_Filesystem, 
    Twig_Environment;

use freest\router\Router;
use jochen\mvc\model\ProjectModel;

/* 
 * Controller.php
 */

class Controller 
{
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
    
    
    protected function startRouter() 
    {        
        $router = new Router();
        $router->route('',          '0');
        $router->route('index.php', '0');
        $router->route('project',   '1');
        $router->route('contact',   '2');
        $this->router = $router;
    }
    private function twigarr_init()
    {        
        $this->twigarr['site_title'] = SITE_TITLE;
        $this->twigarr['www'] = WWW;
    }
    
    
    public function invoke() 
    {
        switch ($this->router->get()) {
            case '1':
                $this->pageProject();
                break;
            case '2':
                $this->pageContact();
                break;
            default:
                $this->pageFront();
        }
    }
    
    protected function pageFront() {
        $this->twigarr['projects'] = ProjectModel::projects();
        $template = $this->twig->load('front.twig');
        echo $template->render($this->twigarr);   
    }
    
    protected function pageProject() {        
        if (ProjectModel::isValidProjectId($this->router->getUri(1))) {
            $this->twigarr['project'] = ProjectModel::project($this->router->getUri(1));
            $template = $this->twig->load('project.twig');
            echo $template->render($this->twigarr);   
        }
        else {
            $this->pageFront();
        }
    }
        
    protected function pageContact() {
        $check = ContactModel::checkContactForm();
        switch ($check['status']) {
            case '1':
                $this->twigarr['status'] = 'success';
                break;
            case 'warning':
                $this->twigarr['status'] = 'danger';
                $this->twigarr['message'] = $check['warning'];
                break;
        }
        $template = $this->twig->load('contact.twig');
        echo $template->render($this->twigarr);   
    }
    
}

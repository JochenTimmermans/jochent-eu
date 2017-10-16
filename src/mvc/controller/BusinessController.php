<?php

namespace btcbe\mvc\controller;

use btcbe\mvc\model\BusinessModel;
use btcbe\modules\classes\Category;
use btcbe\modules\classes\Country;

/* 
 * Controller.php
 */

class BusinessController extends Controller
{
    
    public function invoke() 
    {
        $route2 = $this->router->getUri(1);
        switch ($route2) {
            case "country":
            case "countries":
                $this->country();
                break;
            case "city":
                $this->city();
                break;
            case "add":
                $this->addBusiness();
                break;
            case "lookup":
                $this->lookup();
                break;
            case "category":
                $this->category();
                break;
            default:
                $this->business_front();
        }
    }
    
    
    protected function business_front() {
        $template = $this->twig->load('business/front.twig');
        //$this->twigarr['businesses'] = BusinessModel::businessObjsArr();
        $this->twigarr['businesses'] = BusinessModel::businessObjsArr();
        echo $template->render($this->twigarr);
        // change this to 
        //      Latest Business Added
        //      Country Lookup
        //      Add New Business button
        
    }
    
    public function country()
    {
        $route3 = $this->router->getUri(2);
        if (BusinessModel::isValidCountryId($route3) || BusinessModel::isValidCountryName($route3)) {
            // specific country
            if (BusinessModel::isValidCountryId($route3)) {
                $country = new Country($route3);
            }
            else {
                $country_id = BusinessModel::countryIdFromName($route3);
                $country = new Country($country_id);
            }
            
            if ($this->router->getUri(3) && $this->router->getUri(3) == "city" && 
                    (BusinessModel::isValidCityName($this->router->getUri(4)) || BusinessModel::isValidCityId($this->router->getUri(4)))) {
                $this->twigarr['country_name'] = $country->name();
                $this->twigarr['city_name'] = $this->router->getUri(4);
                $this->twigarr['citybiz'] = BusinessModel::cityBusinessList($this->router->getUri(4));                
                $template = $this->twig->load('business/geo/city_business_list.twig');                
            }
            else {
                $this->twigarr['country_name'] = $country->name();
                $this->twigarr['countrybiz'] = BusinessModel::countryBusinessList($country->id());                
                $template = $this->twig->load('business/geo/country_business_list.twig');
            }
            echo $template->render($this->twigarr);                
        }
        else {
            // all countries
            $template = $this->twig->load('business/geo/countries_list.twig');
            $this->twigarr['countries'] = BusinessModel::countriesList();
            echo $template->render($this->twigarr);                
        }
    }
    
    
    
    
    public function addBusiness()
    {
        // add form
        if (filter_input(INPUT_POST, 'addbusinessform') == "go") {
            $formval = BusinessModel::validate_newBusinessForm();
            if ($formval['status'] == 1) {
                $template = $this->twig->load('success.twig');
                $this->twigarr['message'] = 'Business has been added.'; 
                echo $template->render($this->twigarr);                
            }
            else {
                //echo '1';
                $this->newBusinessForm("ERROR: ".$formval['warning']);
            }
        }
        else {
            // show form 
                //echo '2';
            $this->newBusinessForm();
        }
    }
    
    private function newBusinessForm($message = "")
    {
        $template = $this->twig->load('business/add_business_form.twig');
        $this->twigarr['countries'] = \btcbe\mvc\model\BusinessModel::countriesListFull();
        if ($message != "") { $this->twigarr['warning'] = $message; }
        echo $template->render($this->twigarr);
    }
    
    private function lookup() 
    {
        $business_id = $this->router->getUri(2);
        if (BusinessModel::isValidBusinessId($business_id)) {
            $template = $this->twig->load('business/business_single.twig');
            $this->twigarr['business'] = BusinessModel::businessObj($business_id);
            echo $template->render($this->twigarr);                
        }
        else {
            $this->warning("Invalid business ID.");                
        }
    }
    
    private function category() 
    {
        // show stores from category, ordered by country
        $category_id = $this->router->getUri(2);
        if (BusinessModel::isValidCategoryId($category_id)) {
            $template = $this->twig->load('business/category_country_list.twig');
            $category = new Category($category_id);
            $this->twigarr['category_name'] = $category->name();
            $this->twigarr['catcountries'] = BusinessModel::categoryCountryList($category_id);
            echo $template->render($this->twigarr);                
        }
        else {
            $this->warning("Invalid category ID.");                
        }
    }
    
}

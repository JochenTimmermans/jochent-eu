<?php

namespace btcbe\mvc\model;

use freest\db\DBC;
use btcbe\modules\classes\business\Business;
use btcbe\modules\classes\Country;
use btcbe\modules\classes\Category;
/**
 * Description of BusinessModel
 *
 */
class BusinessModel extends Model 
{
    // BUSINESSES
    public static function businessObjsArr(): Array
    {
        $sql = "SELECT id FROM biz WHERE status = 1 ORDER BY address_country_id ASC,address_city ASC,biz_name ASC;";
        $dbc = new DBC();
        $q = $dbc->query($sql) or die("ERROR @ BusinessModel / businessObjsArr - ".$dbc->error());
        $objs = array();
        while ($row = $q->fetch_assoc()) {
            $biz_id = $row['id'];
            $business = new Business($biz_id);
            $objs[] = $business;
        }
        return $objs;
    }
    
    public static function newestBusinesses(): Array
    {        
        $sql = "SELECT id FROM biz WHERE status = 1 ORDER BY gendate DESC LIMIT 5;";
        $dbc = new DBC();
        $q = $dbc->query($sql) or die("ERROR @ BusinessModel / newestBusinesses - ".$dbc->error());
        $objs = array();
        while ($row = $q->fetch_assoc()) {
            $biz_id = $row['id'];
            $business = new Business($biz_id);
            $objs[] = $business;
        }
        return $objs;
    }
    
    // Countries
    public static function isValidCountryId($country_id): bool
    {
        // check if this is a valid id, for all entries where status = 1
        //echo "BID: ".$business_id;
        $sql = "SELECT name FROM countries WHERE id = '$country_id';";
        $dbc = new DBC();
        $q = $dbc->query($sql) or die("ERROR @ BusinessModel / isValidCountryId - ".$dbc->error());
        return $q->num_rows > 0;
    }
    public static function isValidCountryName($country_name): bool
    {
        // check if this is a valid id, for all entries where status = 1
        //echo "BID: ".$business_id;
        $country_name = strtolower($country_name);
        $sql = "SELECT id FROM countries WHERE name = '$country_name';";
        $dbc = new DBC();
        $q = $dbc->query($sql) or die("ERROR @ BusinessModel / isValidCountryName - ".$dbc->error());
        return $q->num_rows > 0;
    }
    public static function isValidCityName($city_name): bool
    {
        $city_name_clean = strtolower($city_name);
        $sql = "SELECT id FROM biz WHERE LOWER(address_city) = '$city_name_clean';";
        $dbc = new DBC();
        $q = $dbc->query($sql) or die("ERROR @ BusinessModel / isValidCityName - ".$dbc->error());
        return $q->num_rows > 0;
    }
    
    public static function countryIdFromName($country_name): int
    {
        $country_name_clean = strtolower($country_name);
        $sql = "SELECT id FROM countries WHERE LOWER(name) = '$country_name_clean';";
        $dbc = new DBC();
        $q = $dbc->query($sql) or die("ERROR @ BusinessModel / isValidCountryName - ".$dbc->error());
        return $q->fetch_assoc()['id'];
    }
    
    public static function countriesList(): Array
    {
        //$sql = "SELECT id FROM countries ORDER BY name ASC;";
        $sql = "SELECT DISTINCT countries.id AS cid
                    FROM biz 
                    INNER JOIN countries ON biz.address_country_id = countries.id
                    WHERE biz.status = 1
                    ORDER BY countries.name;";
        $dbc = new DBC();
        $q = $dbc->query($sql) or die("ERROR @ BusinessModel / countriesList - ".$dbc->error());
        $out = array();
        while ($row = $q->fetch_assoc()) {
            $country_id = $row['cid'];
            $out[] = new Country($country_id);
        }
        return $out;
    }
    public static function countriesListFull(): Array
    {
        //$sql = "SELECT id FROM countries ORDER BY name ASC;";
        $sql = "SELECT id,name
                    FROM countries 
                    ORDER BY name;";
        $dbc = new DBC();
        $q = $dbc->query($sql) or die("ERROR @ BusinessModel / countriesList - ".$dbc->error());
        $out = array();
        while ($row = $q->fetch_assoc()) {
            $country_id = $row['id'];
            $out[] = new Country($country_id);
        }
        return $out;
    }

    public static function countryBusinessList($country_id): Array
    {
        $sql = "SELECT id FROM biz WHERE status = 1 AND address_country_id = '$country_id' ORDER BY address_city ASC, biz_name ASC;";
        $dbc = new DBC();
        $q = $dbc->query($sql) or die("ERROR @ BusinessModel / countryBusinessList - ".$dbc->error());
        $out = array();
        while ($row = $q->fetch_assoc()) {
            $biz_id = $row['id'];
            $out[] = new Business($biz_id);
        }
        return $out;
    }
    public static function cityBusinessList($city_name): Array
    {
        $city_name_clean = strtolower($city_name);
        $sql = "SELECT id FROM biz WHERE status = 1 AND LOWER(address_city) = '$city_name_clean' ORDER BY biz_name ASC;";
        $dbc = new DBC();
        $q = $dbc->query($sql) or die("ERROR @ BusinessModel / cityBusinessList - ".$dbc->error());
        $out = array();
        while ($row = $q->fetch_assoc()) {
            $biz_id = $row['id'];
            $out[] = new Business($biz_id);
        }
        return $out;
    }
    
    // Categories
    public static function categoriesList(): Array
    {
        $sql = "SELECT id FROM categories ORDER BY name ASC;";
        $dbc = new DBC();
        $q = $dbc->query($sql) or die("ERROR @ BusinessModel / categoriesList - ".$dbc->error());
        $out = array();
        while ($row = $q->fetch_assoc()) {
            $category_id = $row['id'];
            $out[] = new Category($category_id);
        }
        return $out;
    }
    
    public static function isValidCategoryId($category_id): bool
    {
        // check if this is a valid id, for all entries where status = 1
        //echo "BID: ".$business_id;
        $sql = "SELECT name FROM categories WHERE id = '$category_id';";
        $dbc = new DBC();
        $q = $dbc->query($sql) or die("ERROR @ BusinessModel / isValidCategoryId - ".$dbc->error());
        return $q->num_rows > 0;
    }
    public static function categoryCountryList($category_id): Array
    {
        // return countries => stores in country
        
        // first select biz with cat, union that so we get country names in there, then we can sort on country
        
        $sql_countries = "SELECT DISTINCT countries.id AS cid, countries.name AS cname
                            FROM biz 
                            INNER JOIN countries ON biz.address_country_id = countries.id
                            WHERE biz.status = 1 AND biz.category_id = '$category_id'
                            ORDER BY countries.name;";
        $dbc = new DBC();
        $q_countries = $dbc->query($sql_countries) or die("ERROR @ BusinessModel / categoryCountryList - ".$dbc->error());
        $out = array();
        while ($row = $q_countries->fetch_assoc()) {
            $country_id = $row['cid'];
            //echo $country_id."\r\n";
            $country_name = $row['cname'];
            // SELECT businesses from country
            $sql_biz = "SELECT id FROM biz WHERE address_country_id = '$country_id' AND category_id = '$category_id' ORDER BY biz_name ASC;";
            $q_biz = $dbc->query($sql_biz) or die("ERROR @ BusinessModel / categoryCountryList 2 - ".$dbc->error());
            $bizzes = array();
            while ($row2 = $q_biz->fetch_assoc()) {
                $biz_id = $row2['id'];
                $bizzes[] = new Business($biz_id);
            }
            $countryarr = array("id" => $country_id, "name" => $country_name, "bizzes" => $bizzes);
            $out[] = $countryarr; 
        }
        return $out;
    }
    
    // BUSINESS (SINGLE)
    public static function isValidBusinessId($business_id): bool
    {
        // check if this is a valid id, for all entries where status = 1
        //echo "BID: ".$business_id;
        $sql = "SELECT biz_name FROM biz WHERE status = 1 AND id = '$business_id';";
        $dbc = new DBC();
        $q = $dbc->query($sql) or die("ERROR @ BusinessModel / isValidBusinessId - ".$dbc->error());
        return $q->num_rows > 0;
    }
    public static function businessObj($business_id): Business
    {
        return new Business($business_id);
    }
    
    // ADD NEW BUSINESS
    public static function validate_newBusinessForm(): Array
    {
        $business_name = filter_input(INPUT_POST, 'nbf_business_name');
        $website = filter_input(INPUT_POST, 'nbf_website');
        $address_line1 = filter_input(INPUT_POST, 'nbf_address_line1');
        $address_line2 = filter_input(INPUT_POST, 'nbf_address_line2');
        $postcode = filter_input(INPUT_POST, 'nbf_address_postcode');
        $city = filter_input(INPUT_POST, 'nbf_address_city');
        $state = filter_input(INPUT_POST, 'nbf_address_state');
        $country = filter_input(INPUT_POST, 'nbf_address_country');
        $country_wide = filter_input(INPUT_POST, 'nbf_country_wide');
        
        // empty field check
        $invalid = empty($business_name) || empty($address_line1) ||
                empty($postcode) || empty($city) || empty($state) || empty($country);
        if ($invalid) { 
            $empty_field = "none";
            if (empty($business_name)) { $empty_field = 'business_name'; }
            if (empty($address_line1)) { $empty_field = 'address line 1'; }
            if (empty($postcode)) { $empty_field = 'postcode'; }
            if (empty($city)) { $empty_field = 'city'; }
            if (empty($state)) { $empty_field = 'state'; }
            if (empty($country)) { $empty_field = 'country'; }
            
            return array('status' => '2', 'warning' => 'Empty Field: '.$empty_field); 
            
        }
        // fill (legally) empty fields
        if (empty($website)) { $website = NULL; }
        if (empty($address_line2)) { $address_line2 = NULL; }
                
        $sql = "INSERT INTO biz (biz_name, website, address_line1, address_line2, 
                        address_postcode, address_city, address_state, 
                        address_country_id, country_wide, gendate, status)
                VALUES ('$business_name','$website','$address_line1','$address_line2',
                    '$postcode','$city','$state','$country','$country_wide',NOW(), 0);";
        $dbc = new DBC();
        if ($dbc->query($sql)) {
            return array('status' => '1');
        }
        else {
            return array('status' => '2', 'warning' => $dbc->error());
        }
    }
}

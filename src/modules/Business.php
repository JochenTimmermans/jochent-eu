<?php

namespace btcbe\modules\classes\business;

use freest\db\DBC;
use btcbe\modules\classes\Country;
use btcbe\modules\classes\Category;

/**
 * Description of Business
 *
 * @author jfreeman82 <jfreeman@skedaddling.com>
 */
class Business 
{
    private $id;
    private $name;
    private $website;
    private $address_line1;
    private $address_line2;
    private $address_postcode;
    private $address_city;
    private $address_state;
    private $address_country_id;
    private $country_wide;
    private $gendate;
    private $status;
    private $category_id;
    
    public function __construct($business_id)
    {
        $sql = "SELECT biz_name,website,address_line1,address_line2,address_postcode,
                        address_city, address_state, address_country_id, country_wide, 
                        gendate, status, category_id
                FROM biz
                WHERE id = '$business_id';";
        $dbc = new DBC();
        $q = $dbc->query($sql) or die("ERROR @ Business - ".$dbc->error());
        $row = $q->fetch_assoc();
        $this->id =                 $business_id;
        $this->name =               $row['biz_name'];
        $this->website =            $row['website'];
        $this->address_line1 =      $row['address_line1'];
        $this->address_line2 =      $row['address_line2'];
        $this->address_postcode =   $row['address_postcode'];
        $this->address_city =       $row['address_city'];
        $this->address_state =      $row['address_state'];
        $this->address_country_id = $row['address_country_id'];
        $this->country_wide =       $row['country_wide'];
        $this->gendate =            $row['gendate'];
        $this->status =             $row['status'];
        $this->category_id =        $row['category_id'];
    }
    
    // GET
    public function id()                { return $this->id;                 }
    public function name()              { return $this->name;               }
    public function website()           { return $this->website;            }
    public function addressLine1()      { return $this->address_line1;      }
    public function addressLine2()      { return $this->address_line2;      }
    public function addressPostcode()   { return $this->address_postcode;   }
    public function addressCity()       { return $this->address_city;       }
    public function addressState()      { return $this->address_state;      }
    public function addressCountryId()  { return $this->address_country_id; }
    public function countryWide()       { return $this->country_wide;       }
    public function gendate()           { return $this->gendate;            }
    public function status()            { return $this->status;             }
    public function categoryId()        { return $this->category_id;        }
    
    public function countryWideBool(): bool
    {
        if ($this->country_wide == 1) {
            return true;
        }
        else {
            return false;
        }
    }
    public function addressCountry() { 
        $country = new Country($this->address_country_id);
        return $country->name();
    }
    // objects
    public function addressCountryObj() { return new Country($this->address_country_id);    }
    public function categoryObj()       { return new Category($this->category_id);          }
}

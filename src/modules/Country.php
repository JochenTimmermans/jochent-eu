<?php

namespace btcbe\modules\classes;

use freest\db\DBC;

/**
 * Description of Country
 *
 * @author jfreeman82 <jfreeman@skedaddling.com>
 */
class Country {

    private $id;
    private $name;
    
    public function __construct($country_id) 
    {
        $sql = "SELECT name FROM countries WHERE id = '$country_id';";
        $dbc = new DBC();
        $q = $dbc->query($sql) or die("ERROR @ Country - ".$dbc->error());
        $row = $q->fetch_assoc();
        $this->id = $country_id;
        $this->name = $row['name'];
    }
    
    public function id()    { return $this->id;     }
    public function name()  { return $this->name;   }
}

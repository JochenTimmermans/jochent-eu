<?php

namespace btcbe\modules\classes;

use freest\db\DBC;
/**
 * Description of Category
 *
 * @author jfreeman82 <jfreeman@skedaddling.com>
 */
class Category 
{
    private $id;
    private $name;
    
    public function __construct($category_id)
    {
        $sql = "SELECT name FROM categories WHERE id = '$category_id';";
        $dbc = new DBC();
        $q = $dbc->query($sql) or die("ERROR @ Category - ".$dbc->error());
        $this->id = $category_id;
        $this->name = $q->fetch_assoc()['name'];
    }
    
    // getters
    public function id()    { return $this->id;     }
    public function name()  { return $this->name;   }    
    
}

<?php

namespace jochen\projects;

use freest\db\DBC;

/**
 * Description of Project
 *
 * @author jfreeman82 <jfreeman@skedaddling.com>
 */
class Project {
    
    private $id;
    private $title;
    private $description;
    private $imgurl;
    private $created;
    
    public function __construct($pid)
    {
        $sql = "SELECT title,descr,imgurl,created 
                FROM projects 
                WHERE id = '$pid';";
        $dbc = new DBC();
        $q = $dbc->query($sql) or die("ERROR ".__FILE__.$dbc->error());
        $row = $q->fetch_assoc();
        $this->title        = $row['title'];
        $this->description  = $row['descr'];
        $this->imgurl       = $row['imgurl'];
        $this->created      = $row['created'];
    }
    
    // getters
    public function id()            { return $this->id;             }
    public function title()         { return $this->title;          }
    public function description()   { return $this->description;    }
    public function imgurl()        { return $this->imgurl;         }
    public function created()       { return $this->created;        }    
}

<?php

namespace jochen\mvc\model;

use freest\db\DBC;
use jochen\projects\Project;

/**
 * Description of ProjectModel
 *
 * @author jfreeman82 <jfreeman@skedaddling.com>
 */
class ProjectModel 
{
    public static function isValidProjectId($pid):bool
    {        
        $sql = "SELECT title
                FROM projects 
                WHERE id = '$pid';";
        $dbc = new DBC();
        $q = $dbc->query($sql) or die("ERROR @ ".__FILE__." : ".$dbc->error());
        return $q->num_rows > 0;
    }

    public static function projects($limit = 0): array 
    {
        if ($limit != 0) { $lim = "LIMIT $lim"; } else { $lim = ""; }
        $sql = "SELECT id FROM projects ORDER BY created DESC ".$lim.";";
        $dbc = new DBC();
        $q = $dbc->query($sql) or die("ERROR @ ".__FILE__." : ".$dbc->error());
        $out = array();
        while ($row = $q->fetch_assoc()) {
            $out[] = new Project($row['id']);
        }
        return $out;
    }
    
    
    
}

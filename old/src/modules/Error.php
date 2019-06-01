<?php

namespace freest\error;

/**
 * Description of Error
 *
 * @author jfreeman82 <jfreeman@skedaddling.com>
 */
class Error {
    
    public function __construct($page,$msg)
    {
        die("ERROR @ ".$page." - ".$msg);
    }
    
}

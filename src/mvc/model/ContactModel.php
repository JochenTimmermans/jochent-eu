<?php

/**
 * Description of ContactModel
 *
 * @author jfreeman82 <jfreeman@skedaddling.com>
 */
class ContactModel {

    public static function checkContactForm(): array
    {
        if (filter_input(INPUT_POST, 'contactform') == "go") {}
        else {
            return array('status' => '0');
        }
    }
}

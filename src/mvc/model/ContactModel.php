<?php

namespace jochen\mvc\model;

use freest\db\DBC,
    freest\db\Error;

/**
 * Description of ContactModel
 *
 * @author jfreeman82 <jfreeman@skedaddling.com>
 */
class ContactModel 
{
    public static function checkContactForm(): array
    {
        if (filter_input(INPUT_POST, 'cf_form') == "go") {
            $name = filter_input(INPUT_POST, 'cf_name');
            $email = filter_input(INPUT_POST, 'cf_email');
            $subject = filter_input(INPUT_POST, 'cf_subject');
            $message = filter_input(INPUT_POST, 'cf_message');
            if (empty($name) || empty($email) || empty($subject) || empty($message)) {
                return array('status' => 'warning', 'warning' => 'Please fill in all fields.');
            }
            $sql = "INSERT INTO contact (user_name,user_email,subject,message,message_datetime) 
                    VALUES ('$name','$email','$subject','$message',NOW());";
            $dbc = new DBC();
            if ($dbc->query($sql)) {
                return array('status' => '1');
            }
            else {
                new Error(__FILE__." checkContactForm",$dbc->error());
                return array('status' => 'warning', 'warning' => 'A database error has occurred.');
            }
        }
        else {
            return array('status' => '0');
        }
    }
}

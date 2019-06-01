/**
 * Author:  jfreeman82 <jfreeman@skedaddling.com>
 * Created: Sep 08, 2017
 */

DROP DATABASE IF EXISTS jochen;
CREATE DATABASE jochen;

USE jochen;

DROP USER IF EXISTS 'jochenuser'@'localhost';

CREATE USER 'jochenuser'@'localhost' IDENTIFIED BY 'jochenuser12345';

GRANT ALL ON jochen.* TO 'jochenuser'@'localhost';

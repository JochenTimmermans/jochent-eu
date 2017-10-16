/**
 * Author:  jfreeman82 <jfreeman@skedaddling.com>
 * Created: Sep 08, 2017
 */

CREATE DATABASE btcbe;

USE btcbe;

DROP USER IF EXISTS 'btcbeuser'@'localhost';

CREATE USER 'btcbeuser'@'localhost' IDENTIFIED BY 'btcbeuser12345';

GRANT ALL ON btcbe.* TO 'btcbeuser'@'localhost';

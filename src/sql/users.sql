
/**
 * Author:  jfreeman82 <jfreeman@skedaddling.com>
 * Created: Aug 11, 2017
 */

USE btcbe;

CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    email TEXT,
    password TEXT,
    gendate DATETIME);




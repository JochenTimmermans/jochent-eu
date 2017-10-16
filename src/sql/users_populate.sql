/**
 * Author:  jfreeman82 <jfreeman@skedaddling.com>
 * Created: Aug 11, 2017
 */

USE btcbe;

INSERT INTO users (username,email,password,gendate) 
VALUES 
('jfreeman', 'test2@test.com', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', NOW());  /* password = test */
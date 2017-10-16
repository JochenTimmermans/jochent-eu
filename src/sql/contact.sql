/**
 * Author:  jfreeman82 <jfreeman@skedaddling.com>
 * Created: Oct 16, 2017
 */

DROP TABLE IF EXISTS contact;
CREATE TABLE contact (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_name TEXT NOT NULL,
  user_email TEXT NOT NULL,
  message TEXT NOT NULL,
  message_datetime DATETIME NOT NULL
);
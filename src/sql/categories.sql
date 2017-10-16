/**
 * Author:  jfreeman82 <jfreeman@skedaddling.com>
 * Created: Sep 12, 2017
 */


DROP TABLE IF EXISTS categories;
CREATE TABLE categories (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  level_head INT NOT NULL,
  name VARCHAR(100)
);

/**
 * Author:  jfreeman82 <jfreeman@skedaddling.com>
 * Created: Oct 16, 2017
 */

DROP TABLE IF EXISTS projects;
CREATE TABLE projects (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  descr TEXT,
  imgurl TEXT,
  created DATETIME
);

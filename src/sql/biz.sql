/**
 * Author:  jfreeman82 <jfreeman@skedaddling.com>
 * Created: Sep 8, 2017
 */

USE btcbe;

DROP TABLE IF EXISTS biz;

CREATE TABLE biz (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    biz_name VARCHAR(100),
    website TEXT,
    address_line1 TEXT,
    address_line2 TEXT,
    address_postcode VARCHAR(100),
    address_city VARCHAR(200),
    address_state VARCHAR(200),
    address_country_id INT,
    country_wide TINYINT(1) DEFAULT 0,
    gendate DATETIME,
    status TINYINT(1) DEFAULT 0,
    category_id INT,
    FOREIGN KEY (address_country_id) REFERENCES countries(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);




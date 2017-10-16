/**
 * Author:  jfreeman82 <jfreeman@skedaddling.com>
 * Created: Aug 11, 2017
 */

USE btcbe;

DELETE FROM biz;

INSERT INTO biz 
  (biz_name, website, address_line1, address_line2, address_postcode, address_city, address_state, address_country_id, country_wide, gendate, status,category_id) 
VALUES 
  ('Grasmachines Groenewoudt',  'http://groenewoudt.be',    'Hoge Grasdreef 2',     '', '1860',   'Meise',      'Vlaams-Brabant',   24, 0,  NOW(),                  1, 3),
  ('Kapsalon Karin',            'http://kapsalonkarin.be',  'Sluikveld 144B',       '', '9000',   'Gent',       'Oost-Vlaanderen',  24, 1,  NOW(),                  1, 4),
  ('Fashion Milano',            'http://milanfash.it',      'Via del Reggia 2778',  '', '28556',  'Milan',      'Lazio',            118,1,  NOW(),                  1, 4),
  ('Jan mn Kloten',             'http://janmnkloten.be',    'Snobstraat 21',        '', '2600',   'Brasschaat', 'Antwerpen',        24, 0,  NOW(),                  0, 1),
  ('Twin Business Partners',    'https://twinbp.com',       'Tablest 4',            '', '55522',  'droopville', 'AL',               244 0,  '2017-09-29 05:31:22',  1, NULL) 
;
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


define('BASE_URL', 'https://btc.islandshore.net/');
define('ROOT_URL', $_SERVER['DOCUMENT_ROOT'].'/../');
define('WWW', BASE_URL);

define("MYSQL_HOST","localhost");
define("MYSQL_USER","btcbeuser");
define("MYSQL_PASS","btcbeuser12345");
define("MYSQL_DB","btcbe");

define('SITE_TITLE', 'BTC Belgium');

//router
define('BASE_ROUTE', 'public/');


// Requires
require_once 'src/modules/DBC.php';

require_once 'vendor/autoload.php';
require_once 'src/modules/freestrouter/Router.php';

require_once 'src/mvc/controller/Controller.php';
require_once 'src/mvc/controller/BusinessController.php';

require_once 'src/mvc/model/Model.php';
require_once 'src/mvc/model/BusinessModel.php';

require_once 'src/modules/Country.php';
require_once 'src/modules/Business.php';
require_once 'src/modules/Category.php';
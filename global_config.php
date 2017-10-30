<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


define('ROOT_URL', $_SERVER['DOCUMENT_ROOT'].'/../');

if (!file_exists(ROOT_URL.'config.local.php')) {
    die(ROOT_URL."config.local not found.");
}
require ROOT_URL.'config.local.php';
define('WWW', BASE_URL);


define('SITE_TITLE', 'JochenT');

//router
define('BASE_ROUTE', 'public/');


// Requires
require_once 'src/modules/DBC.php';
require_once 'src/modules/Error.php';

require_once 'vendor/autoload.php';
require_once 'src/modules/freestrouter/Router.php';

require_once 'src/mvc/controller/Controller.php';

require_once 'src/mvc/model/ProjectModel.php';
require_once 'src/mvc/model/ContactModel.php';

require_once 'src/modules/Project.php';
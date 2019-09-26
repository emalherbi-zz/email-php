<?php

/*
 * Eduardo Malherbi Martins (http://emalherbi.com/)
 * Copyright @emm
 * Full Stack Web Developer.
 */

header('Access-Control-Allow-Origin: *');

defined('PS') || define('PS', PATH_SEPARATOR);
defined('DS') || define('DS', DIRECTORY_SEPARATOR);

defined('ROOT') || define('ROOT', realpath(__DIR__));
defined('PLUGINS') || define('PLUGINS', ROOT.DS.'_plugins');

require_once PLUGINS.DS.'autoload.php';

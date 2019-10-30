<?php

ini_set('display_errors', 'ALL');
require_once '../vendor/autoload.php';

use Wesleydeveloper\Hotmart\Hotmart;

$config = json_decode(file_get_contents('../config.json'), true);
var_dump($config);
$hot = new Hotmart($config);
var_dump($hot->getLoggedUser());


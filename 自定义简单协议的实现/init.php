<?php
define("PROTOL_PATH", __DIR__ . DIRECTORY_SEPARATOR);

require_once PROTOL_PATH . "vendor/Bootstrap/Autoloader.php";

\Bootstrap\Autoloader::instance()->addRoot(PROTOL_PATH)->init();
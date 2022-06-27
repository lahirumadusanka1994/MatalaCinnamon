<?php

require_once '../../Config/Config.php';
$siteroot = SITE_ROOT;
require_once $siteroot . 'Config/Email.php';
require_once $siteroot.'api/Classes/DbInstance.php';

function autoloadModel($className) {
    $siteroot = SITE_ROOT;
    $filename = $siteroot . "api/Models/". $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}

function autoloadController($className) {
    $siteroot = SITE_ROOT;
    $filename = $siteroot . "api/Classes/" . $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}

function autoloadHelper($className) {
    $siteroot = SITE_ROOT;
    $filename = $siteroot . "api/Helpers/" . $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}

spl_autoload_register("autoloadModel");
spl_autoload_register("autoloadController");
spl_autoload_register("autoloadHelper");
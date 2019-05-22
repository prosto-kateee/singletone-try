<?php
require_once("admin/classes/my.site/class.php");

$objInfoSite = SingletonSiteVars::getInstance();
echo "Current site version is " . $objInfoSite->getSiteVersion();
echo $objInfoSite->getCurFolder();

// echo "<pre>";
// var_dump($_SERVER);
// echo "</pre>";

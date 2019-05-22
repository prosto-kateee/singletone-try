<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/admin/classes/my.site/class.php");

$objInfoSite = SingletonSiteVars::getInstance();
echo "Current site version is " . $objInfoSite->getSiteVersion();
echo $objInfoSite->getCurFolder();

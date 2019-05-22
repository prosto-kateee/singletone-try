<?php
class SingletonSiteVars
{
	private static $instance = null;
	public $arSiteVars = [];
	private $arSiteFolder = [
		"germ" => "German",
		"en" => "English",
		"fr" => "French"
	];

    protected function __construct() { }

    protected function __clone() { }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize singleton");
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new static;
        }
        return self::$instance;
    }
	
	public function getSiteVersion() {
		foreach($this->arSiteFolder as $key => $value) {
		if(strpos($_SERVER["REQUEST_URI"], "/{$key}/") === 0) {
				return $this->arSiteVars["SITE_VERSION"] = $this->arSiteFolder[$key];
			}
		}
		
		if(empty($this->arSiteVars["SITE_VERSION"])) {
			return $this->arSiteVars["SITE_VERSION"] = "Russian";
		}
	}
	
	public function getCurFolder() {
		$path = str_replace("?{$_SERVER['QUERY_STRING']}", '', $_SERVER["REQUEST_URI"]);
		$path = preg_replace("/index(.php||.html)/", '', $path);
		return $path;
	}
}


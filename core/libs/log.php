<?php
namespace core\libs;
use core\libs\config;
class Log
{
	static $class;
    static public function init()
    {
		$driver = config::get('log','DRIVER');
		$class = '\core\libs\driver\log\\'.$driver;
		self::$class = new $class;
    }
	
	//调用core\libs\driver\log\file或mysql里的log方法
	static public function log($name)
    {
		self::$class->log($name);
    }
	
}
?>

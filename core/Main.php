<?php
namespace core;
//use \vendor\qing\Qing;
use core\libs\config;
class Main
{
	public $assign;
	
	public function __construct()
	{
		//new \vendor\qing\Qing;
		$this->getDefaultDbLink();
	}
	
	
	/**
	 * 数据库连接
	 * @return Object
	 */
	private function getDefaultDbLink()
	{
		global $_DB;
		\vendor\qing\Qing::;
	}
	
}	
	
?>
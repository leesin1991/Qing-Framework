<?php
namespace core\libs;
use core\libs\config;
class Basic extends \vendor\qing\Qing
{
	public static $db;
	public function __construct()
	{
		$option = config::get('database');
		parent::__construct($option);
	}
	
	/**
	 * 获取数据列列表
	 * @param table $table
	 * @param array $where  例子: array("a=b","b<d");
	 * @return array多维数组
	 */
	public function getList($table, $columns = '*', $where = null)
	{
		return $this->select($table, $columns , $where);
	}
	
	
}	
	
?>
	
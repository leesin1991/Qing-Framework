<?php
namespace core\libs;
use core\libs\config;
class model extends \vendor\medoo\src\Medoo
{
	public function __construct()
	{
		$option = config::get('database');
		parent::__construct($option);
	}
}	
	
?>
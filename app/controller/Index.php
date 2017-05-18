<?php
namespace app\controller;
use core\libs\model;
class Index extends \core\front
{
	public function  index()
	{
		$data = 'Congratulations ! Qing Framework Running Successfully :-)';
		$this->assign('data',$data	);
		$this->view('index.html');
		
	}
}
	
?>
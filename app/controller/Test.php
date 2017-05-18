<?php
namespace app\controller;
// use core\libs\Basic;
class Test extends \core\front
{
	public function  index()
	{
		// $Basic = new Basic;	
		//$t=$Basic->tableQuote('links');
		// $b = $this->Basic;
		// $rs = $b->select('links','*');
		// p($rs);
		// $model = new model;
		// $rs = $model->getList('links');
		// p($rs);
		$data = 'leesin';
		$this->assign('data',$data);
		$this->view('index.html');
		
	}
}
	
?>
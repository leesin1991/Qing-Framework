<?php
namespace app\controller;
use core\libs\model;
class Index extends \core\front
{
	public function  index()
	{
		//phpinfo();die;
		// $model = new model;
		// p($model);
		// $sql = 'select * from sin_admins';
		// $rs = mysql_query($sql);
		// while($row = mysql_fetch_array($rs)){
			// p($row);
		// }
		// $rs = $model->insert('links', [
		    // 'title' => 'foo',
		// ]);
		
		
		//$rs = $model->select('links','*');
		// p($rs);
		$data = 'Congratulations ! Qing Framework Running Successfully :-)';
		$this->assign('data',$data	);
		$this->view('index.html');
		
	}
}
	
?>
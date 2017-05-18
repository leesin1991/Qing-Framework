<?php
namespace core\libs;
use core\libs\config;
class route
{
	public $ctrl;
	public $action;	
	public function __construct()
	{
		// xxx.com/index/index
		// xxx.com/index.php/index/index
		// 1.隐藏index.php
		// 2.获取URL参数部分并进行处理
		// 3.返回对应的控制器和方法
		//p($_SERVER);
		if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI']!='/'.PROJECT.'/') {
			// index/index
			$path = $_SERVER['REQUEST_URI'];
			$pathArr = explode('/', trim($path,'/'));
			if(isset($pathArr[2])){
				$this->ctrl = $pathArr[2];
			}
			if (isset($pathArr[3])) {
				$this->action = $pathArr[3];
			} else {
				$this->action = config::get('route','ACTION');
			}
			unset($pathArr[0],$pathArr[1],$pathArr[2],$pathArr[3]);
			//将URL多余部分转化为GET参数
			$count = count($pathArr)+4;
			$i = 4;
			while($i < $count){
				if(isset($pathArr[$i+1])){
					$_GET[$pathArr[$i]] = $pathArr[$i+1];
				}
				$i = $i+2;
			}
		} else {
			$this->ctrl = config::get('route','CTRL');
			$this->action = config::get('route','ACTION');
		}
		
	}

	//不适合项目在web根目录，已废弃仅做参考
	public function construct__old()
	{
		//p($_SERVER['REQUEST_URI']);
		// if ($_SERVER['REQUEST_URI']=='/qing/index.php/') {
			// $_SERVER['REQUEST_URI']=='/qing/';
		// }
		// xxx.com/index/index
		// xxx.com/index.php/index/index
		// 1.隐藏index.php
		// 2.获取URL参数部分并进行处理
		// 3.返回对应的控制器和方法
		if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI']!='/qing/') {
			// index/index
			$path = $_SERVER['REQUEST_URI'];
			$pathArr = explode('/', trim($path,'/'));
			if(isset($pathArr[1])){
				$this->ctrl = $pathArr[1];
			}
			unset($pathArr[1]);
			if (isset($pathArr[2])) {
				$this->action = $pathArr[2];
				unset($pathArr[2]);
			} else {
				$this->action = config::get('route','ACTION');
			}
			//将URL多余部分转化为GET参数
			p($pathArr);
			$count = count($pathArr)+2;
			$i = 2;
			while($i < $count){
				if(isset($pathArr[$i+1])){
					$_GET[$pathArr[$i]] = $pathArr[$i+1];
				}
				$i = $i+2;
			}
		} else {
			$this->ctrl = config::get('route','CTRL');
			$this->action = config::get('route','ACTION');
		}
		
	}
	
}	
	
?>
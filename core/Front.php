<?php
namespace core;
use core\libs\config;
use vendor\twig\lib\Twig\Autoloader;
//require_once HOME.'/vendor/twig1/lib/Twig/Autoloader.php';
//Twig_Autoloader::regiser();
class Front
{
	public static $classMap=array();
	public $assign;
	static public function run()
	{
		//\core\libs\log::init();
		//连接数据库
		//$model = new \core\libs\model();
		//$route = new \core\libs\route();
		
		//初始化路由类，返回数组（项目名，控制器，方法，参数）
		$config = array(
			'URL_MODE' => 1,
		);
		\core\libs\Route::init($config);
		$route = \core\libs\Route::makeUrl();
		$ctrlClass = isset($route['controller'])?ucfirst($route['controller']):config::get('route','CTRL');
		$action = isset($route['action'])?$route['action']:config::get('route','ACTION');
		$_GET = $route['param'];
		$strfile = APP.'/controller/'.$ctrlClass.'.php';
		$controller = '\\'.MODULE.'\controller\\'.$ctrlClass;
		//包含对应控制器文件并实例化类调取对应的方法
		if (is_file($strfile)) {
			include $strfile;
			$ctrl = new $controller();
			$ctrl->$action();
			//日志记录
			//\core\libs\log::log('Controller:'.$ctrlClass.'   '.'Action:'.$action);
		}else{
			throw new \Exception("404 Not Found ".$controller);
		}
		
	}
	
	static public function load($class)
	{
		//自动加载类库
		// new \core\route();
		// $class = '\core\route';
		// 将$class转成HOME.'/core/route.php;
		if (isset($classMap[$class])) {
			return true;
		}
		else{
			$class = str_replace('\\', '/', $class);
			$file = HOME.'/'.$class.'.php';
			if (is_file($file)) {
				include $file;
				self::$classMap[$class] = $class;
			}else{
				return false;
			}
		}
	}
	
	/**
	 * 变量传递*
	 * @param $name 传递到视图的变量名
	 * @param $value 传递到视图的变量值
	 */
	public function assign($name,$value)
	{
		$this->assign[$name] = $value;
	}
	
	
	/**
	 * 显示试图*
	 * @param $file
	 * 
	 */
	public function view_resource($file)
	{
		$file = APP.'/view/'.$file;
		if (is_file($file)) {
			extract($this->assign);
			include $file;
		}
	}
	
	/**
	 * Twig显示试图*
	 * @param $file
	 * 
	 */
	public function view($file)
	{
		$file = APP.'/view/'.$file;
		if (is_file($file)) {
			Autoloader::register();
			$loader = new \Twig_Loader_Filesystem(APP.'/view');
			$twig = new \Twig_Environment($loader,array(
				'cache' => HOME.'/log/twig',
				'debug' => DEBUG,
			));
			$template = $twig->loadTemplate('index.html');
			$template ->display($this->assign?$this->assign:array());
		}
	}
	
	/**
	 * 前台登录检查
	 * 
	 */
	public function checkHomeLogin()
	{
		if(!session('login_user')){
			header("Location: /sing/index.php/index/login/index");
	        //$this->error('您尚未登录系统',url('login/index')); 
	    }
	}
	
	/**
	 * 显示试图*
	 * @param $file
	 * 
	 */
	public function Basic($class)
	{
		$file = APP.'/view/'.$file;
		if (is_file($file)) {
			extract($this->assign);
			include $file;
		}
	}
		
}	
	
?>
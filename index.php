<?php
	define('HOME', __DIR__);
	define('CORE', HOME.'/core');
	define('APP', HOME.'/app');
	define('MODULE', 'app');
	//define('PROJECT', 'qing');
	define('DEBUG', TRUE);
	error_reporting(E_ERROR | E_PARSE );
	if (DEBUG) {
		ini_set('display_errors', 'On'); 
	} else {
		ini_set('display_errors', 'Off'); 
	}
	require_once CORE.'/common/function.php';
	require_once CORE.'/Front.php';
	spl_autoload_register('\core\Front::load');
	\core\front::run();
?>
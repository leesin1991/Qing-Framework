<?php
namespace core\libs\driver\log;
use core\libs\config;

class File
{
	public $path; //日志的存储位置
	public function __construct()
	{
		$conf = config::get('log','OPTION');
		$this->path = $conf['PATH'];
	}
    public function log($name,$file='log')
    {
		if (!is_dir($this->path.date('Ymd'))) {
			//注意创建的目录权限一定要设置成0777，否则无法写入以下文件
			mkpath($this->path.date('Ymd'),'0777');
			//mkdir($this->path.date('Ymd'),'0777',true);
		}
		$filename = $this->path.date('Ymd').'/'.$file.'.txt';
		$data = date('Y-m-d H:i:s').json_encode($name).PHP_EOL;
		// $fp = fopen($filename, "a+");
		// fwrite($fp, $data);
		// fclose($fp);
		return file_put_contents($filename, $data, FILE_APPEND);
    }
}
?>

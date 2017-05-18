<?php	
/**
 *快捷打印变量
 * @param $val
 */
function p($val)
{
	if (is_bool($var)) {
		var_dump($val);
	}else {
		echo "<pre style='position:relative;z-index:1000;padding:10px;
		border-radius:5px;background:#F5F5F5;border:1px solid #aaa;font-size:14px;
		line-height:18px;opacity:0 9;'>".print_r($val,true)."</pre>";
		//print_r($val);
	}
}
	
	
/**
 * http_curl
 * @param $url 接口url string
 * @param $type 请求类型 string
 * @param $res 返回数据类型 string
 * @param $arr post请求数组 array
 * @return error/json
 */
function http_curl($url="",$type='get',$res='json',$arr='')
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	if ($type == 'post') {
		curl_setopt($ch, CURLOPT_POST, $url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $arr);
	}
	$output = curl_exec($ch);
	curl_close($ch);
	if ($res == 'json') {
		if (curl_errno($ch)) {
			return curl_errno($ch);
		}
		else{
			return json_decode($output,TRUE);
		}
	}
}


/**
 * 创建多级文件夹 *
 * @param 路径 www.iawim.com/sing/public/uploads/
 * @param 权限 755/777 $mode
 */
function mkpath($path,$mode = 0777)
{
	$path = str_replace("\\","_|",$path);
	$path = str_replace("/","_|",$path);
	$path = str_replace("__","_|",$path);
	$dirs = explode("_|",$path);
	$path = $dirs[0];
	for($i = 1;$i < count($dirs);$i++)
	{
		$path .= "/".$dirs[$i];
		if(!is_dir($path))
		mkdir($path,$mode);
	}
}


/**
 * 生成随机数
 * @param 长度 $length
 * @param 是否是数字 $num
 * @return varchar
 */
function random($length=6,$num)
{
	$str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";   //   输出字符集
	if($num)$str = "0123456789";   //   只输出数字
	$len = strlen($str)-1;
	for($i=0 ; $i<$length; $i++){
	    $s .=  $str[rand(0,$len)];
	}
	return $s;
}

/**
 * 字符串加密
 * @param varchar $txt
 * @return varchar
 */
function encrypt($txt)
{
	return base64_encode(QING.$txt);
}

/**
 * 字符串解密
 * @param varchar $txt
 * @return varchar
 */
function decrypt($txt)
{
	$str =  base64_decode($txt);
	return str_replace(QING,"",$str);
}

/**
 * 信息提示
 * @param varchar $text
 * @param varchar $url
 */
function sysMsg($text,$url="history.go(-1);")
{
	$str = "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />";
	$str .=  "<script>alert('$text');$url</script>";
	die($str);
}

/**
  * 数字列表
  * @param 开始 int $from
  * @param 结束 int $end
  * @param 排序 $sort
  * @return array
  */
function getNumList($from,$end,$sort)
{
	$arr = array();
	if($sort =="DESC"){
		for ($i=$end;$i>$from;$i--){
			$arr[$i] = $i;
		}
	}
	else{
		for ($i=$from;$i<$end;$i++){
			$arr[$i] = $i;
		}
	}
	return $arr;
}

/**
 * 过期时间
 * @param varchar $endtime
 * @return varchar
 */
function leavHr($endtime)
{
	$time = (strtotime($endtime)-time());
  	if ($time >= 86400 ) {
		$day = floor($time/86400);
		$time = $time-$day*86400;
		$str = $day.'天';
		$str .= floor($time/3600).'小时';
	}
	else{
		$str = floor($time/3600).'小时';
	}
  	return $str;
}
	
?>
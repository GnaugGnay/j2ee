<?php
/**
 * 工具箱
 * User: ayi
 * Date: 2014-11-06
 */
class LibUtil
{
	private static $allLoadConfig = array();


	public static function makeOrderNum($type){
		$time = explode('.',microtime(true));
		switch($type){
			case 'form':
				return date('YmdHis',$time[0]).$time[1].rand(10000,99999);
				break;
			case 'payment':
				return date('YmdHis',$time[0]).$time[1].rand(10000,99999);
				break;
			case 'string':
				return md5(mt_rand().time().mt_rand());
				break;
		}
	}
	/*
	 * 获得/写入配置
	 */
	public static function config($name, $value = null, $isTxt = false)
	{
		if (!$name) {
			return false;
		}
		$file = '';
		if (preg_match('/[.\/\\\]/', $name)) {
			$file = $name;
		}

		$cacheConfig = false;
		if (!$file) {
			if (!preg_match('/^conf/i', $name)) {
				$file = RUNTIME_DIR . '/' . CONF_DIR . '/' . $name . '.php';
				$cacheConfig = true;
			} else {
				$name = preg_replace('/^conf/i', '', $name);
				$configPath = ucfirst($name);

				$appRoot = APP_ROOT;
				if(D::$thisAppRoot){
					$appRoot = D::$thisAppRoot;
				}
				$file = $appRoot . '/' . CONF_DIR . '/Conf' . $configPath . '.php';
			}
		}

		//读取
		$re = false;
		if (is_null($value)) {
			if (!empty(self::$allLoadConfig[$name])) {
				return self::$allLoadConfig[$name];
			}
			if (is_file($file)) {
				$re = include $file;
				self::$allLoadConfig[$name] = $re;
			} else {
				Debug::log('配置文件：' . $file . '不存在，返回false', 'warn');
			}
		} else {//写入
			if($cacheConfig){
				$dir = dirname($file);
				if(!is_dir($dir)){
					if(!mkdir($dir, 0777, true)){
						Debug::log('配置文件：' . $dir . '创建目录失败', 'warn');
					}
				}
				if($isTxt){
					$save = $value;
				}else{
					$save = var_export($value, true);
					$save = "<?php\r\n/*本文件由程序自动生成（" . date('Y-m-d H:i:s') . "）*/\r\nreturn {$save};";
				}

				$re = file_put_contents($file, $save);
				if (!$re) {
					Debug::log('配置文件：' . $file . '写入失败', 'warn');
				}
			}else{
				Debug::log('Conf开头的配置为只读文件，不能写入', 'warn');
			}

		}
		return $re;
	}

	public static function request($url, $data = array(), $timeout = 30, $hostIp = '', $userHeader = array(), $proxy = '', $isCookie = false, $files = array())
	{
		$isDebug = Debug::check();
		if ($isDebug) {
			$sTime = microtime(true);
		}

		$url = trim($url);
		if (empty($url)) {
			return array('code' => '0');
		}
		$curl = curl_init();
		$header = array(
			'Accept-Language: zh-cn',
			'Connection: Keep-Alive',
			'Cache-Control: no-cache'
		);

		if (!empty($hostIp)) {
			$urlInfo = parse_url($url);
			$url = str_replace($urlInfo['host'], $hostIp, $url);
			$header[] = "Host: {$urlInfo['host']}";
		}
		if ($userHeader) {
			$header = array_merge($header, $userHeader);
		}

		if ($proxy) {
			curl_setopt($curl, CURLOPT_PROXY, $proxy);
		}

		if ($isCookie) {
			curl_setopt($curl, CURLOPT_COOKIEFILE, '/tmp/curl_cookie.txt');
			curl_setopt($curl, CURLOPT_COOKIEJAR, '/tmp/curl_cookie.txt');
		}



		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_USERAGENT, 'R2Games 1.0.0 (curl) ');
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

		if ($timeout > 0) {
			curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
			curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
		}

		curl_setopt($curl, CURLINFO_HEADER_OUT, true);//header

		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
		curl_setopt($curl, CURLOPT_AUTOREFERER, true);//自动跳转


		$isPost = false;
		$isFile = false;
		if (!empty($data)) {
			$isPost = true;
		}
		if(!empty($files)){
			foreach($files as $name => $file){
				$data[$name] = curl_file_create(realpath($file['path']), $file['type'], $file['name']);
			}
			$isPost = false;
			$isFile = true;
		}


		if($isPost && is_array($data)){
			curl_setopt($curl, CURLOPT_POST, true);//这玩意一定要写在CURLOPT_POSTFIELDS前面
			if(is_array($data)) $data = http_build_query($data);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}
		if($isFile){
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_SAFE_UPLOAD, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}

		if ($isDebug) {
			curl_setopt($curl, CURLOPT_HEADER, true);
		}


		$result['result'] = curl_exec($curl);
		$responseHeader = '';

		if ($isDebug) {//调试模式下输出头部
			$contents = explode("\r\n\r\n", $result['result']);

			$_contents = array();
			foreach ($contents as $content) {
				if (strpos($content, 'HTTP/1.1 100') !== 0 && strpos($content, 'HTTP/1.1 302') !== 0 && strpos($content, 'HTTP/1.1 301') !== 0) {
					$_contents[] = $content;
				}
			}
			$_contents = implode("\r\n\r\n", $_contents);
			list($responseHeader, $result['result']) = explode("\r\n\r\n", $_contents, 2);;
		}

		$result['code'] = curl_getinfo($curl, CURLINFO_HTTP_CODE);

		if ($result['result'] === false) {
			$result['result'] = curl_error($curl);
			$result['code'] = -curl_errno($curl);
		}

		if ($isDebug) {
			$tInfo = curl_getinfo($curl);
			$info['request'] = array(
				'url' => $tInfo['url'],
				'header' => $tInfo['request_header'],
			);
			if ($data) {
				$info['request']['post'] = $data;
			}
			$info['response'] = array(
				'header' => $responseHeader,
				'result' => $result['result'],
				'code' => $result['code'],
			);

			$eTime = microtime(true);
			list($file, $line) = Debug::getPosition();
			$t = round($eTime - $sTime, 3);
			Debug::addMsg('info', "CURL: {$url}（{$t}S，code={$result['code']}）", $file, $line);
			//Debug::addMsg('info', $info, $file, $line);
		}

		curl_close($curl);
		return $result;
	}

	public static function getIp()
	{
		$ip = $_SERVER['REMOTE_ADDR'];
		return $ip;
	}

	public static function tableSplit($id)
	{
		$dbIndex = floor($id / 100000000);
		$tplIndex = floor($id % 100);
		return array($dbIndex, $tplIndex);
	}

	/**
	 * 参数替换
	 * @param string $format
	 * @param array $data
	 * @return string
	 */
	public static function replaceValue($format, $data)
	{
		$pattern1 = '/<\{\$([^\|\>]*)\|?([^\>]*)?\}>/ei';

		$format = @preg_replace($pattern1, 'self::replaceRun(\'\$$1|$2\',$data)', $format);
		while (substr_count($format, '<{') > 0 && substr_count($format, '}>') > 0) {
			$_m = -1;
			for ($x = strpos($format, '<{'); $x < strlen($format) - 1; $x++) {
				if ($format[$x] . $format[$x + 1] == '<{') {
					$_m = $x;
				}

				if ($format[$x] . $format[$x + 1] == '}>' && $_m >= 0) {
					$code = substr($format, $_m + 2, $x - $_m - 2);
					$format = substr($format, 0, $_m) . self::replaceRun($code) . substr($format, $x + 2);
					$_m = -1;
				}
			}
			//$format = preg_replace('/<{((.((?<!<{)[^|](?!}>))+.)(\|((.(?!}>))*.))?)}>/ei', '$5(\'$2\')', $format);
		}

		return $format;
	}

	//可以使用的函数
	private static $allowFunction = array(
		'strtolower' => 1,
		'strtoupper' => 1,
		'urlencode' => 1,
		'urldecode' => 1,
		'serialize' => 1,
		'ip2long' => 1,
		'long2ip' => 1,
		'md5' => 1,
		'substr' => 1,
		'json_decode' => 1,
		'json_encode' => 1,
		'stripcslashes' => 1,
		'addcslashes' => 1,
		'htmlspecialchars_decode' => 1,
		'rawurlencode' => 1,
		'base64_encode' => 1,
	);

	private static function replaceRun($code, $data = array())
	{
		if (empty($code)) {
			return '';
		}
		$code = explode('|', $code);
		if ($code[0][0] == '$') {
			$code[0] = !isset($data[substr($code[0], 1)]) ? "" : $data[substr($code[0], 1)];
		}
		if (empty($code[1])) {
			return $code[0];
		} else {
			$code[1] = explode(":", $code[1]);
			if (empty(self::$allowFunction[$code[1][0]])) {
				return "{$code[1][0]}not allow";
			}
			if (!empty($code[1][1])) {
				$code[0] .= "','" . implode("','", explode(',', $code[1][1]));
			}
			$_s = '';
			eval("\$_s = {$code[1][0]}('{$code[0]}');");
			return $_s;
		}
	}

	//  获得唯一的SessionID
	public static function getSid()
	{
		return base_convert(sprintf('%u',
			crc32(self::getIp() . ' ' . (isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : ''))), 10, 36) .
		'-' . base_convert(microtime(true) * 100, 10, 36) .
		'-' . base_convert(mt_rand(0, 38885), 10, 36);
	}

	public static function defaultValue($value, $default)
	{
		return $value ? $value : $default;
	}

	public static function error($code, $msg,$e = null)
	{
		return array("code" => $code, "msg" => $msg);
	}

	public static function isError($error)
	{
		return is_array($error) && isset($error['code']) && $error['code'] >= 1;
	}

	// 根据IP获取地区信息
	public static function getCityInfo($ip = '')
	{
		if (empty ($ip)) {
			$ip = self::getIp();
		}
		require_once(LIB . "/library/ip/geoipcity.inc");

		if (empty($GEOIP_REGION_NAME)) {
			require(LIB."/library/ip/geoipregionvars.php");
		}
		$gi = geoip_open(LIB . "/library/ip/GeoLiteCity.dat", GEOIP_STANDARD);
		
		$record = geoip_record_by_addr($gi, $ip);
		$ipinfo = array('ip' => '', 'code' => 'unknown', 'country' => 'unknown', 'state' => 'unknown', 'city' => 'unknown');
		$ipinfo['ip'] = $ip;
		if ($record) {
			$ipinfo['code'] = $record->country_code;
			$ipinfo['country'] = $record->country_name;
			$ipinfo['state'] = $GEOIP_REGION_NAME[$record->country_code][$record->region];
			$ipinfo['city'] = $record->city;
		}
		geoip_close($gi);
		return $ipinfo;
	}

	public static function arrayCopy(&$target, $targetKey, &$source, $sourceKey, $isset = true)
	{
		if (!$isset || isset($source[$sourceKey])) {
			$target[$targetKey] = $source[$sourceKey];
		}
	}

	// 对象转化为数组函数
	public static function objectsIntoArray($arrObjData, $arrSkipIndices = array())
	{
		$arrData = array();
		if (is_object($arrObjData)) {
			$arrObjData = get_object_vars($arrObjData);
		}
		if (is_array($arrObjData)) {
			foreach ($arrObjData as $index => $value) {
				if (is_object($value) || is_array($value)) {
					$value = self::objectsIntoArray($value, $arrSkipIndices); // recursive
					// call
				}
				if (in_array($index, $arrSkipIndices)) {
					continue;
				}
				$arrData [$index] = $value;
			}
		}
		return $arrData;
	}

	public static function multi2SingleArray($array, &$return, $preKey)
	{
		if (is_array($array)) {
			foreach ($array as $k => $v) {
				$new = $preKey ? $preKey . "-" . $k : $k;
				if (is_array($v)) {

					$newReturn = self::multi2SingleArray($v, $return, $new);
					$return = $return + $newReturn;
				} else {
					$return[$new] = $v;
				}
			}
		}
		return $return;
	}

	public static function toTimeZone($src, $from_tz = 'Etc/GMT+3', $to_tz = 'Asia/Shanghai', $fm = 'Y-m-d H:i:s')
	{
		$datetime = new DateTime($src, new DateTimeZone($from_tz));
		$datetime->setTimezone(new DateTimeZone($to_tz));
		return $datetime->format($fm);
	}

	public static function getPeriodInterval($period)
	{
		switch ($period) {
			case "annually":
				return 86400 * 365;
			case "annual":
				return 86400 * 365;
			case "monthly":
				return 86400 * 30;
			case "quarterly":
				return 86400 * 30 * 3;
			case "semiannually":
				return 86400 * 180;
			default:
				return 0;
		}
	}

    /**
     * 字符串hash成数值
     * @param $secret 字符串
     * @param int $num 最大值
     * @return float hash值
     */
    public static function getHash($secret,$num = 100){
        $count = 0;
        $max = strlen($secret) >= 8 ? 8 : strlen($secret);
        $hashSeeds = str_split(substr($secret,0,$max),1);
        if(is_array($hashSeeds)){
            foreach($hashSeeds as $char){
                $count += ord($char);
            }
        }
        return floor($count % $num);
    }

    /**
     * 数值hash成数值
     * @param $secret 原始数值
     * @param int $num 最大值
     * @return float hash值
     */
    public static function getIntHash($int,$num = 100){
        return floor($int % $num);
    }

    public static function getQueryPath(){
        $requestUri = $_SERVER['REQUEST_URI'];
        $pos = strpos($requestUri,"?");
        return substr($requestUri,0,$pos ? $pos : strlen($requestUri));
    }


    public static function checkUA(){
    	$ua = $_SERVER['HTTP_USER_AGENT'];
    	if(stripos($ua, 'Mobile') === false || stripos($ua, 'iPad') !== false){
    		return 'PC';
    	} else {
	    	if(stripos($ua, 'Android') !== false){
	    		return 'Android';
	    	}
	    	if(stripos($ua, 'iPhone') !== false){
	    		return 'IOS';
	    	}
	    	return 'PC';
    	}
    }
    public static function GUID(){
        if (function_exists('com_create_guid') === true)
        {
            return strtolower(trim(com_create_guid(), '{}'));
        }

        return strtolower(sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535)));
    }

    public static function isEmail($data){
        $data = trim($data);
        return preg_match("/^\w+([\.-]\w+)*@\w+([\.-]\w+)*\.\w+([-\.]\w+)*$/", $data);
    }


	/**
	 * 检查字符串是否是UTF8状态
	 * @param $str
	 * @return int
	 */
	public static function isUtf8($str)
	{
		return preg_match('%^(?:
		 [\x09\x0A\x0D\x20-\x7E]            # ASCII
	   | [\xC2-\xDF][\x80-\xBF]             # non-overlong 2-byte
	   |  \xE0[\xA0-\xBF][\x80-\xBF]        # excluding overlongs
	   | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}  # straight 3-byte
	   |  \xED[\x80-\x9F][\x80-\xBF]        # excluding surrogates
	   |  \xF0[\x90-\xBF][\x80-\xBF]{2}     # planes 1-3
	   | [\xF1-\xF3][\x80-\xBF]{3}          # planes 4-15
	   |  \xF4[\x80-\x8F][\x80-\xBF]{2}     # plane 16
        )*$%xs', $str);
	}
	/*
	 * 转成UTF8
	 */
	public static function forceUtf8($org)
	{
		if (!is_array($org)) {
			return self::isUtf8($org) ? $org : iconv('GBK', 'UTF-8', $org);
		} else {
			foreach ($org as $k => $v) {
				$org[$k] = self::forceUtf8($v);
			}
			return $org;
		}
	}

	/*
	 * 追加到文件中
	 */
	public static function file_append_contents($filename, $str) {
		if (strlen($str) <= 8192) {
			return file_put_contents($filename, $str, FILE_APPEND);
		}

		$fp = fopen($filename, 'a');
		if (!empty($fp)) {
			stream_set_chunk_size($fp, 2147483647);
			fwrite($fp, $str);
			fclose($fp);
			return true;
		}else{
			return false;
		}
	}

	public static function myTrim($data){
		if(is_array($data)){
			foreach($data as &$_data){
				$_data = self::myTrim($_data);
			}
		}elseif(is_string($data)){
			$data = trim($data);
		}
		return $data;
	}

	public static function getUrl(){
		$url = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		return $url;
	}

	public static  function getSalt($len){
		if($len > 32){
			$len = 32;
		}
		return substr(md5(microtime(true) . mt_rand(100000, 999999)), 0, $len);
	}

	public static function retData($state = true, $data = '', $code = 0,  $msg = '', $extend = array()){
		if($state){
			$re = array(
				'state' => true,
				'code'  => Code::$CODE_SUCCESS,
				'data'  => $data,
			);
		}else{
			$re = array(
				'state' => false,
				'code'  => $code,
				'msg'  => $msg,
			);
			if($data){
				$re['data'] = $data;
			}
		}
		if($extend){
			$re = array_merge($extend, $re);
		}

		return $re;
	}

	public static function reData($code = 0, $data){
		$ct = time();
		$re = array(
			'c'  => $code,
			'data'  => $data,
			'ct'    => $ct,
		);
		return $re;
	}

	public static function clean_xss(&$string, $low = False)
	{
		if (! is_array ( $string ))
		{
			$string = trim ( $string );
			$string = strip_tags ( $string );
			$string = htmlspecialchars ( $string );
			if ($low)
			{
				return True;
			}
			$string = str_replace ( array ('"', "\\", "'", "/", "..", "../", "./", "//" ), '', $string );
			$no = '/%0[0-8bcef]/';
			$string = preg_replace ( $no, '', $string );
			$no = '/%1[0-9a-f]/';
			$string = preg_replace ( $no, '', $string );
			$no = '/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]+/S';
			$string = preg_replace ( $no, '', $string );
			return True;
		}
		$keys = array_keys ( $string );
		foreach ( $keys as $key )
		{
			self::clean_xss ( $string [$key] );
		}
	}

}

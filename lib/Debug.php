<?php
/**
 * 用于程序调试
 * User: a-yi
 * Date: 2014/11/6
 * Time: 18:58
 */

class Debug{
	public static $lastTime = 0;
	public static $startTime = 0;
	private static $printStart = false;
	/*
	 * 开启调试
	 */
	public static function start(){
		Debug::$startTime = microtime(true);
		Debug::$lastTime = Debug::$startTime;
	}
	//$type
	public static function log($msg, $type = 'info'){
		if(!self::check()){
			return;
		}
		$traces = debug_backtrace();
		$file = '';
		$line = '';
		if(!empty($traces[0]['file'])){
			$file = $traces[0]['file'];
			$line = $traces[0]['line'];
			foreach($traces as $trace){
				$mod = basename($trace['file'], '.php');
				if(!in_array($mod, array('LibMysql', 'Model'))){
					$file = $trace['file'];
					$line = $trace['line'];
					break;
				}
			}
		}
		//识别类型
		if(!$type){
			if(is_array($msg) && is_array($msg[0])){
				$type = 'table';
			}
		}
		if(!$type){
			$type = 'log';
		}
		self::addMsg($type, $msg, $file, $line);
	}

	public static function error($errno, $errstr, $errfile, $errline){
		$type = 'error';
		if($errno == E_WARNING ){
			$type = 'warn';
		}
		if($errno == E_NOTICE){
			return;
		}
		self::addMsg($type, $errstr, $errfile, $errline);
	}
	public static function shutdown(){
		if(!is_null($e = error_get_last())){
			self::addMsg('error', $e['message'], $e['file'], $e['line']);
		}
	}
	public static function timer(){
		if(!self::check()){
			return;
		}
		$traces = debug_backtrace();
		$file = '';
		$line = '';
		if(!empty($traces[0]['file'])){
			$file = $traces[0]['file'];
			$line = $traces[0]['line'];
		}
		$nowTime = microtime(true);
		$totalTime = $nowTime - self::$startTime;
		$lastPointTime = $nowTime - self::$lastTime;
		self::$lastTime = $nowTime;
		$totalTime = round($totalTime, 3);
		$lastPointTime = round($lastPointTime, 3);
		$msg = "[计时器]总时间：{$totalTime} S；距上一个计时点：{$lastPointTime} S";
		self::addMsg('info', $msg, $file, $line);
	}
	public static function addMsg($type, $msg, $file, $line){
		if(!self::check()){
			return false;
		}
		if(!self::$printStart){
			$url = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
			$content = "\r\n-----------------------------------";
			$content .= "\r\n[" . date('Y-m-d H:i:s') . "] {$_SERVER['REMOTE_ADDR']} {$url}";
			if(!empty($_POST)){
				$_save = array();
				foreach($_POST as $name => $value){
					if(is_string($value) && strlen($value) > 200){
						$_save[$name] = substr($value, 0, 200) . '...[LONG TEXT]';
					}else{
						$_save[$name] = $value;
					}
				}
				$content .= "\r\nPOST: " . var_export($_save, true);
			}
			if(!empty($_COOKIE)){
				$content .= "\r\nCOOKIE: " . var_export($_COOKIE, true);
			}
			$content .= "\r\n";
			self::saveLog($content);
			self::$printStart = true;
		}

		if(is_array($msg)){
			$msg = var_export($msg, true);
		}
		if($msg === ''){
			$msg = '[EMPTY]';
		}
		if($msg === false){
			$msg = 'false';
		}
		return self::saveLog('[' . date('Y-m-d H:i:s') . ']' . ucfirst($type) . ": {$file} {$line}\r\n{$msg}\r\n");
	}

	public static function check(){
		return defined('DEBUG') ? DEBUG : false;
	}

	private static function saveLog($msg){
		$y = date('Y');
		$m = date('m');
		$d = date('d');
		$dir = RUNTIME_DIR . "/logs/{$y}{$m}";
		if(!is_dir($dir)){
			$re = mkdir($dir, 0777, true);
			if(!$re){
				return false;
			}
		}

		return file_put_contents($dir . "/{$y}{$m}{$d}.log", $msg, FILE_APPEND);
	}
}
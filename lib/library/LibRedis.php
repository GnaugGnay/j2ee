<?php
/**
 * Created by PhpStorm.
 * User: ayi
 * Date: 14-6-23
 * Time: 下午4:44
 */

class LibRedis {
	protected static $instance;
	public static function getInstance($name = 'default'){
		if (empty(self::$instance[$name])) {
			$config = include ROOT . '/' . CONF_DIR . '/redis.php';
			if(empty($config[$name])){
				Debug::log('Redis[' . $name . ']配置不存在', 'error');
				return false;
			}
			$_config = $config[$name];
			$_instance = new Redis;
			if(!$_instance->pconnect($_config[0], $_config[1]) ){
				Debug::log('Redis[' . $name . ']连接失败', 'error');
				return false;
			}
			if(!empty($_config[2]) && ! $_instance->auth($_config[2])){
				Debug::log('Redis[' . $name . ']校验失败', 'error');
				return false;
			}
			// 库前缀
			if(!empty($_config[3])){
				$_instance->setOption(Redis::OPT_PREFIX, $_config[3]);
			}

			self::$instance[$name] = $_instance;
		}else{
			$_instance = self::$instance[$name];
		}
		return $_instance ;
	}
}
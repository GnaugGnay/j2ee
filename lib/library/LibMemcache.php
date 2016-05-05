<?php
/**
 * Created by PhpStorm.
 * User: ayi
 * Date: 14-6-23
 * Time: 下午4:44
 */

class LibMemcache{
	protected static $instance;
	public static function getInstance($name = 'default'){
		if (empty(self::$instance[$name])) {
			$config = include ROOT . '/' . CONF_DIR . '/memcache.php';
			if(empty($config[$name])){
				Debug::log('memcache[' . $name . ']配置不存在', 'error');
				return false;
			}
			$_config = $config[$name];
            $_instance = new Memcache();
            if(is_string($_config)){
				$_config = array($_config);
			}
			foreach($_config as $conf){
				$conf = explode(':', $conf);
				if(empty($conf[1])){
					$conf[1] = 11211;
				}

                $_instance->addServer($conf[0], $conf[1]);
            }

			self::$instance[$name] = $_instance;
		}else{
			$_instance = self::$instance[$name];
		}
		return $_instance ;
	}
}
<?php
/**
 * Created by PhpStorm.
 * User: ayi
 * Date: 14-6-23
 * Time: 下午4:44
 */

class LibActiveMq {
	protected static $instance;
	public static function getInstance($name = 'default'){
		if(!$name) $name = 'default';
		if (empty(self::$instance[$name])) {
			$config = include ROOT . '/' . CONF_DIR . '/activemq.php';

			if(empty($config[$name])){
				Debug::log('ActiveMq[' . $name . ']配置不存在', 'error');
				return false;
			}
			$_config = $config[$name];
			$_config[0] = empty($_config[0]) ? '127.0.0.1' : $_config[0];
			$_config[1] = empty($_config[1]) ? '61613' : $_config[1];
			$_instance = new Stomp("tcp://{$_config[0]}:{$_config[1]}");

			self::$instance[$name] = $_instance;
		}else{
			$_instance = self::$instance[$name];
		}
		return $_instance ;
	}

	public static function publish($queue, $msg = '', $name = 'default'){
		$activeMq = self::getInstance($name);
		return $activeMq->send($queue, $msg);
	}

	public static function subscribe($queue, $callback = '', $name = ''){
		$activeMq = self::getInstance($name);
		$activeMq->subscribe($queue);
		while (true) {
			if ($activeMq->hasFrame()) {
				$frame = $activeMq->readFrame();
				if ($frame != NULL) {
					call_user_func($callback, $frame->body);
					$activeMq->ack($frame);
				}
			}else{
			}
		}
	}
}
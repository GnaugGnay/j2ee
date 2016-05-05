<?php
/**
 * 控制器的基类
 * User: a-yi
 * Date: 2015/07/08
 */
class Controller{
	public $tpl = '';

	public $outType = 'smarty';
	/**
	 * @var array 用于收集提交给模板的变量
	 */
	public $out;

	/**
	 * REQUEST值
	 *
	 * @param mixed $name 支持字符串或者数组，如果是数据，需要递归检查，默认什么都不过滤
	 * @param string $type 1) int integer 整形；2) float 浮点型；3) json传过来的数据为json数据；4) /.../需要符合正则；
	 * @param string $default 如果取不到，默认值
	 * @return string
	 */
	protected function R($name, $type = '', $default = ''){
		return $this->getValue($name, $_REQUEST, $type, $default);
	}

	/**
	 * GET值
	 *
	 * @param mixed $name 支持字符串或者数组，如果是数据，需要递归检查，默认什么都不过滤
	 * @param string $type 1) int integer 整形；2) float 浮点型；3) json传过来的数据为json数据；4) /.../需要符合正则；
	 * @param string $default 如果取不到，默认值
	 * @return string
	 */
	protected function get($name, $type = '', $default = ''){
		return $this->getValue($name, $_GET, $type, $default);
	}

	/**
	 * POST值
	 *
	 * @param mixed $name 支持字符串或者数组，如果是数据，需要递归检查，默认什么都不过滤
	 * @param string $type 1) int integer 整形；2) float 浮点型；3) json传过来的数据为json数据；4) /.../需要符合正则；
	 * @param string $default 如果取不到，默认值
	 * @return string
	 */
	protected function post($name, $type = '', $default = ''){
		return $this->getValue($name, $_POST, $type, $default);
	}

	/*
	 * 获得数据
	 */
	/**
	 * @param $name
	 * @param $data
	 * @param $type
	 * @param $default
	 * @return array|mixed|string
	 */
	private function getValue($name, $data, $type, $default){
		if(isset($data[$name])){
			return $this->_ff($data[$name], $type, $default);
		}else{
			return $default;
		}
	}

	/*
	 * 过滤函数
	 */
	private function _ff($value, $type = '', $default = ''){
		if(is_array($value)){
			return array_map(array($this, '_ff'), $value);
		}else{
			//系统自动转义的情况下需要将转义的字符串纠正回来
			if(get_magic_quotes_gpc()){
				$value = stripslashes($value);
			}

			$isReg = preg_match("/^\/.*\/[a-z]*$/", $type) ? true : false;

			if(in_array($type, array('int', 'integer', 'float'))){
				settype($value, $type);
				if(!$value){
					$value = $default;
				}
			}elseif($type == 'json'){
				$value = json_decode($value, true);
				if(!$value){
					$value = array();
				}
				$value = json_encode($value);
			}elseif($isReg) {
				if (!preg_match($type, $value)) {
					$value = $default;
				}
			}
			return $value;
		}
	}


	/**
	 * 调用smarty
	 *
	 * @param string $tpl 模板xxx.tpl或者xxx.html
	 * @param bool $return 是否将结果作为一个变量返回
	 * @param array $out 变量
	 * @param string $tplDir 切换模板目录
	 * @return bool|string
	 * @throws Exception
	 * @throws SmartyException
	 */
	protected function view($tpl, $return = false, $out = null, $tplDir = TPL_DIR){
		if(!$return){
			$this->outType = '';
		}

		$appRoot = APP_ROOT;
		if(D::$thisAppRoot){
			$appRoot = D::$thisAppRoot;
		}

		$smarty = new Smarty();
		$smarty->setTemplateDir($appRoot . '/' . $tplDir);
		$smarty->setCompileDir(RUNTIME_DIR . '/' . CACHE_DIR);
		$smarty->setCacheDir(RUNTIME_DIR . '/' . CACHE_DIR);
		$smarty->left_delimiter = '<{';
		$smarty->right_delimiter = '}>';
		$smarty->error_reporting = 0;
		$smarty->caching = false;
		$smarty->compile_check = true;
		$smarty->escape_html = true;
		$this->out = !is_null($out) ? $out : $this->out;
		if(!is_array($this->out)){
			$this->out = array();
		}

		if(substr($tpl, -4) !== '.tpl' && substr($tpl, -5) !== '.html'){
			$tpl .= '.tpl';
		}
		if(is_array($out)){
			$this->out = array_merge($this->out, $out);
		}
		foreach($this->out as $name => $out){
			$smarty->assign($name, $out);
		}
		if($return){
			$re = $smarty->fetch($tpl);
		}else{
			$smarty->display($tpl);
			$re = true;
		}
		return $re;
	}

	/**
	 * 渲染
	 */
	protected function display(){
		if(empty($this->outType) || $this->outType == 'none' || $this->outType == 'string' || $this->outType == 'layout'){
			return;
		}elseif($this->outType == 'json'){
			$this->json($this->out);
			return;
		}elseif($this->outType == 'smarty'){
			if(empty($this->tpl)){
				$ct = strtolower(D::$ct);
				$ac = strtolower(D::$ac);
				$this->tpl = "{$ct}/{$ac}.tpl";
			}

			$this->view($this->tpl);
		}
	}

	/**
	 * 输出json或者jsonp字符串
	 * @param mixed $out 变量
	 * @param string $jsonCallback getJSON使用的name
	 */
	protected function json($out = null, $jsonCallback = 'jsoncallback'){
		$this->outType = '';
		$callback = $this->get($jsonCallback, '/^\w+$/');
		if(!is_null($out)){
			$value = $out;
		}else{
			$value = $this->out;
		}
		$value = json_encode($value);
		if($callback){
			echo "{$callback}({$value})";
		}else{
			echo $value;
		}
	}

	/*
	 * 跳转
	 */
	protected function Go($url, $type = 'php', $isTop = false){
		if(!$type || $type == 'php'){
			header('Location: ' . $url);
		}else{
			$top = $isTop ? 'top.' : '';
			echo '<script type="text/javascript">' . $top . 'location.href="' . $url . '";</script>';
		}
		exit;
	}

	function __destruct(){
		$this->display();
	}

}
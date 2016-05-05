<?php
/**
 * 处理对外API
 * 请求源包括：SDK的API请求、前端的jsonP请求或者ajax请求，目前这有这两种
 * SDK全部为
 * User: a-yi
 * Date: 2015/07/18
 */
class CtlApi extends Controller {
	public function index(){
		$this->outType = 'json';
		$from = $this->get('from', "/^(server|sdk|browser)$/i", 'sdk');
		$method = $this->get('method');

		$srvApi = new SrvApi;
		if($from == 'browser'){
			$data = empty($_GET['jsoncallback']) ? $_POST : $_GET;//jsonp全部用GET 其他用POST
		}else{
			$data = $_POST;//其他全部用POST
		}

		$this->out = $srvApi->run($method, $from, $data);

		Debug::log($this->out);
	}
}
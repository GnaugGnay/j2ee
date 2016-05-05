<?php
/**
 * 站点入口
 * User: a-yi
 * Date: 2015/07/07
 */
class CtlIndex extends Controller {
	public function index(){
		$this->outType = 'string';
		$pageTag = $this->get('p');//页面的标记
		if($pageTag==''){
			$this->Go('');
		}
		$app = $this->get('app');//标记是否从app过来
		$page = $this->R('page', 'int', 0);//当前页码
        $more = $this->get('more');//more
        $classify_id = $this->get('classify_id');
		$uid = $this->R('uid');
		$token = $this->R('token');
        $appId = $this->R('app_id');
        $type = $this->R('type','string','detail');

        $extend = array(
			'page' => $page,
			'app'  => $app,
            'more' => $more,
            'classify_id' => $classify_id,
			'uid' => $uid,
			'token' => $token,
			'appId' => $appId,
            'type' => $type,
		);
		$srvView  = new SrvView();


		$re = $srvView->view($pageTag, $extend);
        $this->outType = 'json';
        $this->out = $re;
	}
}
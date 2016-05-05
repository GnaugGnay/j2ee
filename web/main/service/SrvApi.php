<?php
/**
 * 接口中心
 * 整站的接口通过http://www.xxx.com/api/?method=user.xxx或者http://www.xxx.com/api/?method=user.xxx&from=js这样来提供
 * 接口业务要在/system/模块/service/SrvXxxApi中实现
 * User: a-yi
 * Date: 2015/7/18
 */
class SrvApi{
	public function run($method, $from = '', $data = array()){
        $method = explode('.', $method);
		if(count($method) != 2){
			return LibUtil::reData(Code::$CODE_API_METHOD_FORBIDDEN, Code::$MSG_API_METHOD_FORBIDDEN);
		}

		$module = strtolower(trim($method[0]));
		$method = strtolower(trim($method[1]));

		if(empty($data['sign'])){
			unset($data['sign']);
		}
		if(empty($data['time'])){
			unset($data['time']);
		}
		if(empty($data['method'])){
			unset($data['method']);
		}
		if(empty($data['ct'])){
			unset($data['ct']);
		}
		if(empty($data['ac'])){
			unset($data['ac']);
		}

		/// 检测用户的用户名密码, 订单接口，评论接口，修改个人信息接口
		if($module === "order" || $module === "person" || $module === 'cart' || $method === 'addcomment' ||
			$method === 'comfirmmsg' || $method === 'addgoods' || $method === 'favgoods' ||
			$method === 'getfavlist' ||  $method === 'getpersonlist' || $method === 'delcomment' ||
			$method === 'reportMsg' || $method === 'changephone') {
			$data = SrvUserApi::check($data);
			if(!$data) {
				return LibUtil::reData(Code::$CODE_API_NOT_AUTH, Code::$MSG_API_NOT_AUTH);
			}
		}

		$module	=	"Srv".(ucfirst($module))."Api";
		$obj	=	new $module();
		$re = $obj->$method($data);

		if($re === null){
			return LibUtil::reData(Code::$CODE_API_METHOD_NOT_EXISTS, Code::$MSG_API_METHOD_NOT_EXISTS);
		}else{
			return $re;
		}
	}

}
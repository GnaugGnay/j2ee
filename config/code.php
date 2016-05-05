<?php
class Code{
	static $HomePage = 50;
	static $Discovery = 51;
	static $MobileCategory = 52;
	static $MobileTagSearch = 54;

	static $TypeHot = 100;
	static $TypeLike = 101;
	static $TypeNew = 102;

	static $CODE_SYSTEM_ERROR = '100';
	static $MSG_SYSTEM_ERROR = '系统发生未知异常';
	static $CODE_LACK_VALUE = '101';
	static $MSG_LACK_VALUE = '缺少必要参数';

	static $CODE_SUCCESS = '0';//处理成功

	//API/接口相关
	static $CODE_API_LACK_APP_ID = '300';
	static $MSG_API_LACK_APP_ID = '缺少APP_ID，接口必须带app_id';
	static $CODE_API_APP_ID_NOT_EXISTS = '301';
	static $MSG_API_APP_ID_NOT_EXISTS = '系统没有配置该App ID';
	static $CODE_API_LACK_SIGN = '302';
	static $MSG_API_LACK_SIGN = '缺少Sign，接口必须带sign';
	static $CODE_API_CHECK_SIGN_ERROR = '303';
	static $MSG_API_CHECK_SIGN_ERROR = '接口校验失败';
	static $CODE_API_METHOD_ERROR = '304';
	static $MSG_API_METHOD_ERROR = '接口传参method格式错误，应该为module.method';
	static $CODE_API_METHOD_NOT_EXISTS = '305';
	static $MSG_API_METHOD_NOT_EXISTS = '接口不存在';
	static $CODE_API_METHOD_FORBIDDEN = '305';
	static $MSG_API_METHOD_FORBIDDEN = '接口不允许访问';
	static $CODE_API_NOT_LOGIN = '306';
	static $MSG_API_NOT_LOGIN = '用户未登录';
	static $CODE_API_EMPTY_AUTH = '307';
	static $MSG_API_EMPTY_AUTH = 'Token不存在';
	static $CODE_API_NOT_AUTH = '405';				// 也算密码错误，统一处理
	static $MSG_API_NOT_AUTH = 'token校验失败，请重新登录';

	//User相关
	static $CODE_LACK_REG_INFO = '401';
	static $MSG_LACK_REG_INFO = '缺少手机号码、邮箱或者帐号';
	static $CODE_LACK_REG_PASSWORD = '402';
	static $MSG_LACK_REG_PASSWORD = '密码不能为空';
	static $CODE_FORBIDDEN_USER = '403';
	static $MSG_FORBIDDEN_USER = '帐号已经被锁定，请联系客服人员';
	static $CODE_USER_NOT_EXISTS = '404';
	static $MSG_USER_NOT_EXISTS = '用户不存在';
	static $CODE_ERROR_PWD = '405';
	static $MSG_ERROR_PWD = '密码不正确';
	static $CODE_PHONE_EXISTS = '406';
	static $MSG_PHONE_EXISTS = '手机号码已经存在';
	static $CODE_EMAIL_EXISTS = '407';
	static $MSG_EMAIL_EXISTS = '电子邮箱已经存在';
	static $CODE_USERNAME_EXISTS = '408';
	static $MSG_USERNAME_EXISTS = '帐号已经存在';
	static $CODE_ERROR_OLD_PWD = '409';
	static $MSG_ERROR_OLD_PWD = '您输入的密码不正确';
	static $CODE_SAVE_USER_ERROR = '410';
	static $MSG_SAVE_USER_ERROR = '系统发生故障，保存用户数据失败，请稍后再操作';
	static $CODE_PHONE_ERROR_FORMAT = '411';
	static $MSG_PHONE_ERROR_FORMAT = '您输入的手机号码不正确';
	static $CODE_EMAIL_ERROR_FORMAT = '412';
	static $MSG_EMAIL_ERROR_FORMAT = '您输入的邮箱格式不正确';
	static $CODE_USERNAME_ERROR_FORMAT = '413';
	static $MSG_USERNAME_ERROR_FORMAT = '帐号由3-20个字符（包括英文、数字、下划线）组成，不能全为数字';
	static $CODE_PASSWORD_ERROR_FORMAT = '414';
	static $MSG_PASSWORD_ERROR_FORMAT = '密码至少由6个字符组成';
	static $CODE_OLD_PASSWORD_ERROR = '415';
	static $MSG_OLD_PASSWORD_ERROR = '当前密码不正确';
	static $CODE_UPLOAD_ERROR = '416';
	static $CODE_LACK_REG_PHONE = '417';
	static $MSG_LACK_REG_PHONE = '缺少手机号';


	//安全中心
	static $CODE_SAFETY_USER_NOT_EXISTS = '500';
	static $MSG_SAFETY_USER_NOT_EXISTS = '用户不存在';
	static $CODE_SAFETY_USER_NOT_LOGIN = '501';
	static $MSG_SAFETY_USER_NOT_LOGIN = '必须登录后才能修改密码';
	static $CODE_SAFETY_PHONE_NOT_THIS_USER = '502';
	static $MSG_SAFETY_PHONE_NOT_THIS_USER = '您输入的手机号码和当前帐号的手机号码不一致';
	static $CODE_SAFETY_EMAIL_NOT_THIS_USER = '503';
	static $MSG_SAFETY_EMAIL_NOT_THIS_USER = '您输入的邮箱和当前帐号的邮箱不一致';
	static $CODE_SAFETY_TPL_NOT_SET = '504';
	static $MSG_SAFETY_TPL_NOT_SET = '邮件或者短信模板未配置';
	static $CODE_SAFETY_EMPTY_CODE = '505';
	static $MSG_SAFETY_EMPTY_CODE = '系统出现故障，无法获取校验码，请稍后再试';
	static $CODE_SAFETY_CODE_ERROR = '506';
	static $MSG_SAFETY_CODE_ERROR = '您输入的校验码不正确';
	static $CODE_SAFETY_CODE_LOSS = '507';
	static $MSG_SAFETY_CODE_LOSS = '校验码已过期，请重新发起请求';
	static $CODE_SAFETY_CODE_NOT_CHECK = '508';
	static $MSG_SAFETY_CODE_NOT_CHECK  = '请先验证校验码';
    static $CODE_SAFETY_PHONE_EXISTS = '509';
    static $MSG_SAFETY_PHONE_EXISTS = '该号码已经绑定其他账号';

	//消息系统
	static $CODE_MESSAGE_SMTP_NOT_SET = '600';
	static $MSG_MESSAGE_SMTP_NOT_SET = '邮件发送系统（SMTP）帐号未设置';
	static $CODE_MESSAGE_MAIL_ERROR = '601';
	static $MSG_MESSAGE_MAIL_ERROR = '发送邮件失败：';

    //cms
    static $CODE_COMMENT_ERROR = '700';
    static $MSG_COMMENT_ERROR = '评论失败';
    static $CODE_COLLECT_ERROR = '701';
    static $MSG_COLLECT_ERROR = '收藏失败，请检查是否已收藏过';

	//支付
	static $CODE_PAY_ERROR_PAY_ID = '1000';
	static $MSG_PAY_ERROR_PAY_ID = '支付单号非法';
	static $CODE_PAY_ERROR_PAY_ALREADY = '1001';
	static $MSG_PAY_ERROR_PAY_ALREADY = '该订单已经支付过，请勿重复支付';
	static $CODE_PAY_ERROR_UPDATE = '1002';
	static $MSG_PAY_ERROR_UPDATE = '更新订单状态失败';
	static $CODE_PAY_ERROR_SUPPORT = '1003';
	static $MSG_PAY_ERROR_SUPPORT = '暂不支持此支付方式';

	//项目
	static $CODE_ZAO_ERROR_USER_ID = '1003';  // 不合法的用戶ID
	static $CODE_SAFETY_INVITE_NOT_EXISTS = '1004';
	static $MSG_IDENTITY_ERROR_FORMAT = '身份证格式不正确';
	static $CODE_LACK_REG_IDENTITY = '1006';
	static $MSG_LACK_REG_IDENTITY = '身份证不能为空';
	static $CODE_LACK_REG_QQ = '1007';
	static $MSG_LACK_REG_QQ = 'QQ号不能为空';
	static $CODE_QQ_ERROR_FORMAT = '1008';
	static $MSG_QQ_ERROR_FORMAT = 'QQ号格式不正确';
	static $CODE_LACK_REG_BANK_USERNAME = '1009';
	static $MSG_LACK_REG_BANK_USERNAME = '银行户名不能为空';
	static $CODE_LACK_REG_BANK_ID = '1010';
	static $MSG_LACK_REG_BANK_ID = '银行账号不能为空';
	static $CODE_BANK_ID_ERROR_FORMAT = '1011';
	static $MSG_BANK_ID_ERROR_FORMAT = '银行卡号格式不正确';
	static $CODE_BANK_ID_ERROR = '1012';
	static $MSG_BANK_ID_ERROR = '银行账户不一致,请重新输入';
	static $CODE_LACK_REG_BANK_NAME = '1013';
	static $MSG_LACK_REG_BANK_NAME = '开户行名称不能为空';
	static $CODE_LACK_REG_BANK_PROVINCE = '1014';
	static $MSG_LACK_REG_BANK_PROVINCE = '请选择开户行所在省份';
	static $CODE_LACK_REG_BANK_CITY = '1015';
	static $MSG_LACK_REG_BANK_CITY = '开户行所在城市不能为空';
	static $CODE_LACK_REG_BANK_BRANCH = '1016';
	static $MSG_LACK_REG_BANK_BRANCH = '分行及支行不能为空';
	static $CODE_LACK_REG_IMG_SUM = '1017';
	static $MSG_LACK_REG_IMG_SUM = '图像数量不足，请重新提交';
	static $CODE_DEAL_TYPE_NOT_EXISTS = '1018';
	static $MSG_DEAL_TYPE_NOT_EXISTS = '没有该交易类型';
	static $CODE_MONEY_ERROR_FORMAT = '1019';
	static $MSG_MONEY_ERROR_FORMAT = '金额格式不正确';
	static $CODE_AMOUNT_INSUFFICIENT ='1021';
	static $MSG_AMOUNT_INSUFFICIENT ='您的月交易额不足，无法提现';
	static $CODE_MONEY_TOO_MANY ='1022';
	static $MSG_MONEY_TOO_MANY ='操作失败，余额不足';
	static $CODE_LACK_BACK_CONTENT = '1023';
	static $MSG_LACK_BACK_CONTENT = '请提交反馈的内容';
	static $CODE_LACK_REG_BANK_CARD = '1024';
	static $MSG_LACK_REG_BANK_CARD = '您还未添加银行卡';


}
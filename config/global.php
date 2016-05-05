<?php
header("content-type:text/html; charset=utf-8");
/*
 * 定义当前app_id app_key
 */
if(!defined('CODE_KEY')) define('CODE_KEY', 'LIOE-KHST-L0XE-PS2I');
if(!defined('ADMIN_LOGIN_KEY')) define('ADMIN_LOGIN_KEY', 'KSIX-YUSN-L0XE-PS2I');

if(!defined('APP_URL')) define('APP_URL', 'http://121.42.204.170');


/**
 * 定义时区
 */
if(!defined('TIME_ZONE')) define('TIME_ZONE', 'Asia/Shanghai');
/**
 * 是否进行调试
     */
if(!defined('DEBUG')) define('DEBUG', true);

/*
 * 配置当前使用的语言
 */
if(!defined('APP_LANG')) define('APP_LANG', 'zh_CN');

/*
 * 数据表前缀
 */
if(!defined('DB_TABLE_ZAO_PREFIX')) define('DB_TABLE_ZAO_PREFIX', 'zao_');

/*
 * 系统静态文件
 */
if(!defined('SYS_ZAO_STATIC_URL')) define('SYS_ZAO_STATIC_URL', '/zao/static');

/*
 * 站点皮肤目录
 */
if(!defined('APP_SKIN_DIR')) define('APP_SKIN_DIR', WEB_ROOT . '/skin');

/*
 * 模块文件
 */
if(!defined('APP_MODULE_DIR')) define('APP_MODULE_DIR', WEB_ROOT . '/plugins/modules');
if(!defined('APP_LAYOUT_DIR')) define('APP_LAYOUT_DIR', WEB_ROOT . '/plugins/layouts');
if(!defined('APP_PAGE_DIR')) define('APP_PAGE_DIR', WEB_ROOT . '/plugins/pages');


/*
 * 默认分页条数
 */

if(!defined('APP_DEFAULT_PAGE_NUM')) define('APP_DEFAULT_PAGE_NUM', 20);

/*
 * 默认分页条数
 */

if(!defined('REG_NEED_CHECK_CODE')) define('REG_NEED_CHECK_CODE', 1);

/*
 * 文件上传地址
 */

if(!defined('PIC_UPLOAD_DIR')) define('PIC_UPLOAD_DIR', WEB_ROOT . '/uploads');
if(!defined('PIC_UPLOAD_URL')) define('PIC_UPLOAD_URL', '/uploads');

if(!defined('PIC_UPLOAD_GOODS_DIR')) define('PIC_UPLOAD_GOODS_DIR', WEB_ROOT .'/uploads/goods'); // 商品目录
if(!defined('PIC_UPLOAD_GOODS_URL')) define('PIC_UPLOAD_GOODS_URL', '/uploads/goods'); // 商品URL

if(!defined('PIC_UPLOAD_USER_DIR')) define('PIC_UPLOAD_USER_DIR', WEB_ROOT .'/uploads/user'); // 头像目录
if(!defined('PIC_UPLOAD_USER_URL')) define('PIC_UPLOAD_USER_URL', '/uploads/user'); // 商品URL

if(!defined('ICON_DIR')) define('ICON_DIR', PIC_UPLOAD_DIR.'/icon/');

/*
 * 默认值
 */
if(!defined('MATERIAL_URL')) define('MATERIAL_URL',PIC_UPLOAD_URL.'/pic_nav/');
if(!defined('MATERIAL_APP_NAV_URL')) define('MATERIAL_APP_NAV_URL',PIC_UPLOAD_URL.'/app_nav/');
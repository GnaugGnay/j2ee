//通用方法,通过一个对象封装页面可能用到的方法
var Util = {
    isLogin: function() { //判断是否登录
        var isLogin = window.localStorage.getItem('j2ee_isLogin');
        if (isLogin === 'true') {
            return true;
        } else {
            return false;
        }
    },
    getUserType: function() { //拿到用户类型，1代表学生，0代表管理员
        return Number(window.localStorage.getItem('j2ee_usertype'));
    },
    getUsername: function() { //返回用户名
        return window.localStorage.getItem('j2ee_username');
    }
}

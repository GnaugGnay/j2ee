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
    },
    getFullname: function() { //返回用户姓名
        return window.localStorage.getItem('j2ee_fullname');
    },
    getGroupId: function() { //返回分组id，0代表没有分组
        return window.localStorage.getItem('j2ee_groupId');
    },
    getTotalScore: function(array) {
        var sum = 0;
        for (var i = 0, len = array.length; i < len; i++) {
            sum += Number(array[i]);
        }
        return sum;
    },
    getQueryString: function(token) {
        var reg = new RegExp('(^|&)' + token + '=([^&]*)(&|$)', 'i');
        var r = window.location.search.substr(1).match(reg);
        if (r != null) {
            return unescape(r[2]);
        }
        return null;
    }
}

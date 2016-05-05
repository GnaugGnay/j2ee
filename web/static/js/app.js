'use strict';

var app = angular.module('myApp', ['ui.router']);

//路由配置
app.config(function($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.when("", "/");
    $stateProvider
        .state("login", { //登录界面
            url: "/login",
            templateUrl: "./static/template/login.html",
            controller: 'loginController'
        })
        .state("user", { //用户界面
            url: "/user",
            templateUrl: "./static/template/user.html",
            controller: 'userController'
        })
        .state("changePassword", { //修改密码
            url: "/changePassword",
            templateUrl: "./static/template/changePassword.html",
            controller: 'userController'
        })
        .state("home", { //主页
            url: "/",
            templateUrl: "./static/template/home.html",
            controller: function($scope, $state) {
                console.log("enter home");
            }
        })
        .state("introduce", { //课程介绍
            url: "/introduce",
            templateUrl: "./static/template/introduce.html"
        })
        .state("teachTeam_1", { //课程负责人
            url: "/teachTeam_1",
            templateUrl: "./static/template/teachTeam_1.html"
        })
        .state("teachTeam_2", { //课题组主要成员
            url: "/teachTeam_2",
            templateUrl: "./static/template/teachTeam_2.html"
        })
        .state("teachTeam_3", { //教育改革与研究
            url: "/teachTeam_3",
            templateUrl: "./static/template/teachTeam_3.html"
        })
        .state("teachContent_1", { //教学大纲
            url: "/teachContent_1",
            templateUrl: "./static/template/teachContent_1.html"
        })
        .state("teachContent_2", { //教学日历
            url: "/teachContent_2",
            templateUrl: "./static/template/teachContent_2.html"
        })
        .state("teachResource_1", { //教学课件
            url: "/teachResource_1",
            templateUrl: "./static/template/teachResource_1.html"
        })
        .state("teachResource_2", { //实验指导
            url: "/teachResource_2",
            templateUrl: "./static/template/teachResource_2.html"
        })
        .state("homework", { //实验指导
            url: "/homework",
            templateUrl: "./static/template/homework.html",
            controller: 'homeworkController'
        })
        .state("forum", { //课程论坛
            url: "/forum",
            templateUrl: "./static/template/forum.html"
        })
        .state("extended_1", { //javaEE相关资源
            url: "/extended_1",
            templateUrl: "./static/template/extended_1.html"
        })
        .state("extended_2", { //常见问题及解决
            url: "/extended_2",
            templateUrl: "./static/template/extended_2.html"
        })
        .state("extended_3", { //最新技术展望
            url: "/extended_3",
            templateUrl: "./static/template/extended_3.html"
        })
        .state("onlineQuiz", { //在线测试
            url: "/onlineQuiz",
            templateUrl: "./static/template/onlineQuiz.html",
            controller: 'onlineQuizController'
        })
        .state("ppt_1", { //第1章 Web应用概述
            url: "/ppt_1",
            templateUrl: "./static/template/pptPage/ppt_1.html"
        })
        .state("ppt_2", { //第2章 JavaEE_概述
            url: "/ppt_2",
            templateUrl: "./static/template/pptPage/ppt_2.html"
        })
        .state("ppt_3", { //第3章 HTML基础知识
            url: "/ppt_3",
            templateUrl: "./static/template/pptPage/ppt_3.html"
        })
        .state("ppt_4", { //第4章 HTTP协议
            url: "/ppt_4",
            templateUrl: "./static/template/pptPage/ppt_4.html"
        })
        .state("ppt_5", { //第5章 J2EE开发环境的构建
            url: "/ppt_5",
            templateUrl: "./static/template/pptPage/ppt_5.html"
        })
        .state("ppt_6", { //第6章 基于Java Servlet的Web程序开发
            url: "/ppt_6",
            templateUrl: "./static/template/pptPage/ppt_6.html"
        })
        .state("ppt_7", { //第7章 基于JSP的Web程序开发
            url: "/ppt_7",
            templateUrl: "./static/template/pptPage/ppt_7.html"
        })
        .state("ppt_8", { //第8章 基于Java的数据库访问接口JDBC
            url: "/ppt_8",
            templateUrl: "./static/template/pptPage/ppt_8.html"
        })
        .state("ppt_9", { //第9章 EJB的原理与开发
            url: "/ppt_9",
            templateUrl: "./static/template/pptPage/ppt_9.html"
        })
        .state("ppt_10", { //第10章 Web服务介绍
            url: "/ppt_10",
            templateUrl: "./static/template/pptPage/ppt_10.html"
        })
        .state("ppt_11", { //第11章 JavaEE开源框架介绍
            url: "/ppt_11",
            templateUrl: "./static/template/pptPage/ppt_11.html"
        })
        .state("experiment_1", { //实验一 搭建J2EE开发环境
            url: "/experiment_1",
            templateUrl: "./static/template/wordPage/experiment_1.html"
        })
        .state("experiment_2", { //实验二  Eclipse下Servlet编程
            url: "/experiment_2",
            templateUrl: "./static/template/wordPage/experiment_2.html"
        })
        .state("experiment_3", { //实验三  JavaBean在JSP页面中的应用
            url: "/experiment_3",
            templateUrl: "./static/template/wordPage/experiment_3.html"
        })
        .state("experiment_4", { //实验四  Eclipse下JDBC编程
            url: "/experiment_4",
            templateUrl: "./static/template/wordPage/experiment_4.html"
        })
        .state("experiment_5", { //实验五  无状态会话EJB
            url: "/experiment_5",
            templateUrl: "./static/template/wordPage/experiment_5.html"
        })
        .state("test", { //测试页面
            url: "/test",
            templateUrl: "./static/template/test.html"
        });
});

//将request payload => form-data
app.config(function($httpProvider) {
    $httpProvider.defaults.headers.post = { 'Content-Type': 'application/x-www-form-urlencoded' };
    $httpProvider.defaults.transformRequest = function(obj) {
        var str = [];
        for (var p in obj) str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
        return str.join("&");
    }
});

app.controller('mainController', function($scope, $state) {
    // 左侧边栏的原生对象
    var leftBar = document.getElementById('sidebar_left');
    //依据url来初始化侧边栏
    function initLeftBar() {
        var targetHash = (location.hash).substr(2);
        if (targetHash == '') { targetHash = 'home'; }
        var leftBarItems = leftBar.getElementsByClassName('js-list-item');
        var hash, item;
        for (var i = 0, len = leftBarItems.length; i < len; i++) { //得到每一个的ui-sref属性
            item = angular.element(leftBarItems[i]);
            hash = item.attr('ui-sref');
            if (hash == targetHash) {
                item.addClass('active');
                var ngShow = item.parent().parent().attr('ng-show'); //寻找父元素中的ng-show属性
                if (ngShow) {
                    $scope[ngShow] = true; //展开侧边栏相应子列表
                }
                break;
            }
        }
    }
    initLeftBar();
    // 侧边栏对有2级菜单的列表项点击展开或关闭
    $scope.fdropDown = function(index) {
        var length = leftBar.getElementsByClassName('list-item').length;
        for (var i = 1; i <= length; i++) {
            if (i == index) continue;
            $scope['dorpDown_' + i] = false;
        }
        $scope['dorpDown_' + index] = !$scope['dorpDown_' + index];
    }

    // 在屏幕小于992px时点击菜单按钮出现导航栏，导航栏自带关闭按钮
    $scope.showClassify = function() {
        if (angular.element(leftBar).hasClass('open')) {
            angular.element(leftBar).removeClass('open');
        } else {
            angular.element(leftBar).addClass('open');
        }
    }

    // 点击是增加active类
    var listItem = leftBar.getElementsByClassName('js-list-item');
    angular.element(listItem).on('click', function(event) {
        angular.element(listItem).removeClass('active');
        angular.element(event.currentTarget).addClass('active');
        //当屏幕小时点击要把侧边栏隐藏
        var viewportWidth = document.body.clientWidth;
        if (viewportWidth < 992) {
            angular.element(leftBar).removeClass('open');
        }
    });

    //刷新页面时用户登录的话初始化右上角
    if (Util.isLogin()) {
        $scope.user = window.localStorage.getItem('j2ee_username');
    }
    
    //判断是否登录进行跳转
    $scope.goUser = function() {
        if (Util.isLogin()) {
            $state.go('user');
        } else {
            $state.go('login');
        }
    }
});

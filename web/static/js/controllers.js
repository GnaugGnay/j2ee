// 测试
angular.module('myApp')
    .controller('testController', function($scope) {
        $scope.test1 = '测试测试';
        $scope.test = function() {
            this.test1 = '123123';
        };
    })
    //用户登录页面
    .controller('loginController', function($scope, $http, $rootScope, $state) {
        console.log(Util.isLogin());
        $scope.login = function() {
            var username = $scope.username;
            var password = $scope.password;
            if (!validate(username, password)) {
                return;
            } else {
                var postData = {
                    username: username,
                    password: password
                }
                $http.post('/main/?ct=api&method=user.login', postData).success(function(response) {
                    var data = response.data;
                    if (data.length) {
                        $rootScope.user = username;
                        window.localStorage.setItem('j2ee_username', username);
                        window.localStorage.setItem('j2ee_uid', data[0].uid);
                        window.localStorage.setItem('j2ee_usertype', data[0].usertype);
                        window.localStorage.setItem('j2ee_isLogin', true);
                        window.localStorage.setItem('j2ee_fullname', data[0].fullname);
                        $state.go('user');
                    } else {
                        alert("用户名或密码错误");
                    }
                });
            }
        };

        function validate(username, password) {
            if (!username) {
                alert("用户名不能为空!");
                return false;
            }
            if (!password) {
                alert("密码不能为空!");
                return false;
            }
            return true;
        };
    })
    //用户页面
    .controller('userController', function($scope, $http, $state) {
        //如果用户是学生，就显示往期的小测结果
        if (Util.getUserType() == 1) {
            var username = Util.getUsername();
            var postData = { username: username };
            $http.post('/main/?ct=api&method=user.pastScore',postData).success(function (response) {
                $scope.score = response.data;
            });
        }
        //退出登录
        $scope.quitLogin = function() {
            if (confirm("确认退出登录？")) {
                window.localStorage.setItem('j2ee_isLogin', false);
                window.localStorage.removeItem('j2ee_username');
                window.localStorage.removeItem('j2ee_uid');
                window.localStorage.removeItem('j2ee_usertype');
                window.localStorage.removeItem('j2ee_fullname');
                window.location.href = '/';
            }
        };
        //导入学生名单
        $scope.userFormSubmit = function() {
            var excel = document.getElementById('userFormExcel').value;
            var form = document.getElementById('userForm');
            if (excel == "") {
                alert("请先选择文件");
                return;
            }
            if (confirm("确认提交？")) {
                form.submit();
                alert("提交成功");
            }

        };
        //修改密码
        $scope.changePassword = function() {

            var oldPassword = $scope.oldPassword;
            var newPassword = $scope.newPassword;
            var newPasswordR = $scope.newPasswordR;
            if (!validate(oldPassword, newPassword, newPasswordR)) {
                return;
            }
            var postData = {
                username: Util.getUsername(),
                oldPassword: oldPassword,
                newPassword: newPassword
            };
            $http.post('/main/?ct=api&method=user.changePassword', postData).success(function(response) {
                var data = response.data;
                if (data.length == 0) {
                    alert("原密码错误");
                    $scope.oldPassword = '';
                } else {
                    history.go(-1);
                    alert("修改成功！");
                }
            });
        };

        function validate(oldP, newP, newPR) {
            if (!oldP) {
                alert("原密码不能为空！");
                return false;
            }
            if (!newP) {
                alert("新密码不能为空！");
                return false;
            }
            if (!newPR) {
                alert("请再次输入新密码。");
                return false;
            }
            if (newP != newPR) {
                alert("两次新密码输入不一致");
                $scope.newPassword = '';
                $scope.newPasswordR = '';
                return false;
            }
            return true;
        };
    })
    .controller('homeworkController', function($scope, $http) { //作业下载

        $http.post('/main/?ct=api&method=homework.getHomeworks').success(function(response) {
            var homework = response.data;
            $scope.homework = homework;
        });

        // 判断是否是管理员账号控制作业删除按钮
        if (Util.getUserType() == 0) {
            $scope.deleteBtn = false;
        } else {
            $scope.deleteBtn = true;
        }
        // var homework = [
        //  {
        //      test:'作业1'
        //  },
        //  {
        //      test:'作业2'
        //  }
        // ];
        // $scope.homework = homework;
        $scope.showDetail = function() {
            this.detail = !this.detail;
        };
        $scope.deleteHw = function() {
            if (confirm("确认删除？")) {
                var postData = {
                    hw_no: this.hw_no
                };
                $http.post('/main/?ct=api&method=homework.deleteHomework', postData).success(function(response) {
                    if (response) {
                        var homework = response.data;
                        $scope.homework = homework;
                    }
                });
            }
        };
    })
    //在线测试
    .controller('onlineQuizController', function($scope, $http) {
        $http.post('/main/?ct=api&method=quiz.getQuiz').success(function(response) {
            $scope.quiz = response.data;
        });
        $scope.submit = function() {
            var quizList = $scope.quiz;
            // if (confirm("确认提交？")) {
            //     for (data in quiz) {
            //         console.log(data);
            //     }
            // }
            var quizsLength = quizList.length;
            var scoreList = [];
            for (var i = 0; i < quizsLength; i++) {
                var name = 'question_' + i;
                var answerList = document.getElementsByName(name);
                var myAnswer = [];
                var correctAnswer = quizList[i].answer;
                var isMulti = correctAnswer.length == 1 ? false : true;
                for (var j = 0, len = answerList.length; j < len; j++) {
                    if (answerList[j].checked) {
                        myAnswer.push(answerFormat(j));
                        if (!isMulti) {
                            break;
                        }
                    }
                }
                if (myAnswer.join(',') == correctAnswer) {
                    scoreList.push(1);
                } else {
                    scoreList.push(0);
                }
            }
            var postData = {
                scoreList: scoreList
            };
            console.log(postData);
            $http.post('/main/?ct=api&method=quiz.test', postData).success(function(response) {
                console.log(response);
            });
        };

        function answerFormat(number) {
            switch (number) {
                case 0:
                    return 'A';
                    break;
                case 1:
                    return 'B';
                    break;
                case 2:
                    return 'C';
                    break;
                case 3:
                    return 'D';
                    break;
                default:
                    return 'A';
                    break;
            }
        }
    });

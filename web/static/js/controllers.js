// 测试
angular.module('myApp')
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
                        window.localStorage.setItem('j2ee_usertype', data[0].usertype);
                        window.localStorage.setItem('j2ee_isLogin', true);
                        window.localStorage.setItem('j2ee_fullname', data[0].fullname);
                        window.localStorage.setItem('j2ee_groupId', data[0].group_id);
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
            $scope.teacher = false;
            $scope.student = true;
            var username = Util.getUsername();
            var postData = { username: username };
            $http.post('/main/?ct=api&method=userscore.pastScore', postData).success(function(response) {
                if (response.data.length == 0) {
                    $scope.noPastScore = true;
                    return;
                }
                $scope.score = response.data;
            });
            $scope.jumpMyGroup = function() {
                var groupId = Util.getGroupId();
                if (groupId == 0) {
                    alert('你还未加入任何小组');
                    $state.go('courseDesignGroup');
                } else {
                    $state.go('groupDetail', { group_id: groupId });
                }
            };
        } else {
            $scope.teacher = true;
            $scope.student = false;
            //往期测试
            $http.post('/main/?ct=api&method=quiz.getPastQuiz').success(function(response) {
                if (response.data.length == 0) {
                    $scope.noPastQuiz = true;
                    return;
                }
                $scope.pastQuiz = response.data;

            });
            $scope.showDetail = function() {
                this.detail = !this.detail;
            };
            //发布在线测试
            $scope.releaseQuiz = function() {
                if (confirm("确认发布这些试题?")) {
                    var quiz_id = this.quiz_id;
                    var postData = {
                        quiz_id: quiz_id
                    };
                    $http.post('/main/?ct=api&method=quiz.releaseQuiz', postData).success(function(response) {
                        if (response.data) {
                            alert("发布成功");
                            $state.go('onlineQuiz');
                        }
                    });
                }
            };
            //结束当前测试 
            $scope.closeOnlineQuiz = function() {
                if (confirm("确认结束当前在线测试？")) {
                    $http.post('/main/?ct=api&method=user.closeOnlineQuiz').success(function(response) {
                        if (response.data) {
                            alert("在线测试已结束，可查看相关数据");
                        }
                    });
                }
            };
            //统计正确率 
            $scope.countCorrectRate = function() {
                var _self = this;
                var quiz_id = _self.quiz_id;
                var postData = {
                    quiz_id: quiz_id
                };
                $http.post('/main/?ct=api&method=userscore.countCorrect', postData).success(function(response) {
                    var data = response.data.correctRate;
                    var number = response.data.scoreNum;
                    var str = "";
                    for (var i = 0, len = data.length; i < len; i++) {
                        str += (i + 1) + '. ' + data[i] + ' | ';
                    }
                    str += '   已有' + 　number　 + '人提交了测试.'
                    _self.correctRate = str;
                });
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
    //课程设计
    .controller('courseDesignController', function($scope, $http, $state) {
        $http.post('/main/?ct=api&method=homework.getHomeworks').success(function(response) {
            var homework = response.data;
            $scope.homework = homework;
        });
        if (Util.getUserType() == 1) { //学生
            var groupLeader;
            $http.post('/main/?ct=api&method=group.getGroupMember', { group_id: Util.getGroupId() }).success(function(response) {
                var groupMember = JSON.parse(response.data[0].group_member);
                var str = '';
                for (var i = 0, len = groupMember.length; i < len; i++) {
                    str += ',' + groupMember[i].name;
                }
                $scope.groupMember = str.substr(1);
                groupLeader = response.data[0].group_leader;
            });
            $scope.courseDesighSubmit = function() {
                var form = document.getElementById('courseDesighForm');
                var doc = document.getElementById('courseDesighFile').value;
                if (doc == "") {
                    alert("请先选择文件");
                    return;
                }
                if (confirm("确认提交？")) {
                    if (groupLeader != Util.getUsername()) {
                        alert("您没有提交权限，请联系小组长来提交");
                        return;
                    }
                    form.submit();
                    form.action += '&group_id=' + Util.getGroupId();
                    alert("提交成功");

                }
            };
        } else { //老师
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
            $scope.homeworkDocSubmit = function($event) {
                var doc = document.getElementById('homeworkDoc').value;
                var deadline = document.getElementById('deadline').value;
                var form = document.getElementById('homeworkForm');
                if (doc == "") {
                    alert("请先选择文件");
                    return;
                }
                if (deadline == "") {
                    alert("请选择截止时间");
                    return;
                } else {
                    if (confirm("确认提交？")) {
                        form.submit();
                        alert("提交成功");
                        location.reload();
                    }
                }
            };
        }

        $scope.showDetail = function() {
            this.detail = !this.detail;
        };


    })
    //课程设计分组
    .controller('courseDesignGroupController', function($scope, $http, $state) {
        $http.post('/main/?ct=api&method=group.getGroups').success(function(response) {
            if (response.c) {
                var groups = response.data;
                if (groups.length > 0) {
                    $scope.isNotEmpty = true;
                    $scope.groups = groups;
                }
            }
        });
        if (Util.getGroupId() != 0) {
            $scope.hasGroup = true;
        }
        if (Util.getUserType() == 1) { //学生
            $scope.enterGroup = function() {
                if (confirm("确认加入此小组？")) {
                    var username = Util.getUsername();
                    var name = Util.getFullname();
                    var group_id = this.group_id;
                    var postData = {
                        group_id: group_id,
                        username: username,
                        name: name
                    };
                    $http.post('/main/?ct=api&method=group.enterGroup', postData).success(function(response) {
                        alert(response.msg);
                        window.localStorage.setItem('j2ee_groupId', group_id);
                        location.reload();
                    });
                }
            };
        } else {
            $scope.createGroups = function() {
                var number = $scope.numPerGroup;
                if (!number || number <= 0) {
                    alert("请输入大于0的数字");
                    return;
                }
                $http.post('/main/?ct=api&method=group.createGroups', { number: number }).success(function(response) {
                    if (response.c) {
                        alert("生成成功");
                        location.reload();
                    }
                });
            };
            $scope.groupDetail = function() {
                $state.go('groupDetail', { group_id: this.group_id });
            };
        }

    })
    //小组详细
    .controller('groupDetailController', function($scope, $http, $stateParams) {
        var groupId = $stateParams.group_id;
        var recordId;
        $http.post('/main/?ct=api&method=group.getGroupMember', { group_id: groupId }).success(function(response) {
            var groupMember = JSON.parse(response.data[0].group_member);
            $scope.groupMember = groupMember;
        });
        $http.post('/main/?ct=api&method=commitrecord.getRecord', { group_id: groupId }).success(function(response) {
            $scope.record = response.data;
        });
        if (Util.getUserType() == 0) { //老师
            $scope.showPopUp = function() {
                $scope.popUp = true;
                recordId = this.recordId;
            };
            $scope.hidePopUp = function() {
                $scope.popUp = false;
                $scope.homeworkScore = '';
                $scope.homeworkComment = '';
            };
            $scope.giveScore = function() {
                var score = $scope.homeworkScore;
                var comment = $scope.homeworkComment;
                if (!(score <= 100 && score >= 0)) {
                    alert("请输入0到100之间的数字");
                    return;
                }
                var postData = {
                    score: score,
                    tea_comment: comment,
                    record_id: recordId,
                    group_id: groupId
                };
                $http.post('/main/?ct=api&method=commitrecord.giveScore', postData).success(function(response) {
                    alert("评分成功");
                    $scope.record = response.data;
                    $scope.popUp = false;
                    $scope.homeworkScore = '';
                    $scope.homeworkComment = '';
                });
            }
        }

    })
    //试题库(章节目录)
    .controller('questionController', function($scope, $http, $state) {
        if (Util.getUserType() == 1) {
            $http.post('/main/?ct=api&method=section.getSectionsStu').success(function(response) {
                $scope.sections = response.data;
            });
        } else {
            $http.post('/main/?ct=api&method=section.getSectionsTea').success(function(response) {
                $scope.sections = response.data;
            });
        }

        $scope.jump = function() {
            $state.go('questionBankSub', { section_id: this.sectionId });
        }
    })
    //试题库(根据具体章节显示题目)
    .controller('questionSubController', function($scope, $http, $stateParams) {
        var sectionId = $stateParams.section_id;
        $scope.section_id = sectionId;
        var postData = {
            section_id: sectionId
        }
        var questionIds = [];
        $http.post('/main/?ct=api&method=question.getQuestions', postData).success(function(response) {
            var questions = response.data;
            $scope.questions = questions;
            for (var i = 0, len = questions.length; i < len; i++) {
                questionIds.push(questions[i].question_id);
            }
        });
        if (Util.getUserType() == 0) { //老师
            $scope.addPastQuiz = function() {
                var targetQuesIds = [];
                var checkboxs = document.getElementsByName('choose_ques');
                for (var i = 0, len = checkboxs.length; i < len; i++) {
                    if (checkboxs[i].checked) {
                        targetQuesIds.push(questionIds[i]);
                    }
                }
                if (targetQuesIds.length < 1) {
                    alert("请选择至少一个题目");
                    return;
                }
                if (confirm("您当前选择了" + targetQuesIds.length + "个题目，确认添加？")) {
                    var postData = {
                        question_ids: targetQuesIds.join(',')
                    }
                    $http.post('/main/?ct=api&method=quiz.addToPastQuiz', postData).success(function(response) {
                        if (response.data) {
                            alert("success!");
                        }
                    });
                }
            };
            $scope.openSection = function() {
                if (confirm("确认开放本章试题？")) {
                    $http.post('/main/?ct=api&method=section.openSection', postData).success(function(response) {
                        if (response.data) {
                            alert("开放成功");
                        }
                    });
                }
            };
            $scope.closeSection = function() {
                if (confirm("确认关闭本章试题？")) {
                    $http.post('/main/?ct=api&method=section.closeSection', postData).success(function(response) {
                        if (response.data) {
                            alert("关闭成功");
                        }
                    });
                }
            };
        }
        $scope.showAnswer = function() {
            $scope.rightAnswer = true;
        };
    })
    //学生名单，包括成绩
    .controller('studentListController', function($scope, $http) {
        $http.post('/main/?ct=api&method=userscore.getStuList').success(function(response) {
            console.log(response);
            $scope.quiz_times = response.data.quiz_times;
            $scope.listData = response.data.listData;
        });
    })
    .controller('forumController', function($scope, $http) {
        $http.post('/main/?ct=api&method=forum.getPosts').success(function(response) {
            $scope.posts = response.data;
        });
        var postId;
        $scope.comment = function() {
            var comment = $scope.forumComment;
            if (comment == '' || !comment) {
                alert("请填写评论内容");
                return;
            }
            var postData = {
                post_id: postId,
                username: Util.getUsername(),
                name: Util.getFullname(),
                comment: $scope.forumComment
            };
            $http.post('/main/?ct=api&method=forum.comment',postData).success(function(response) {
                if (response.c) {
                    alert("评论成功");
                    $scope.popUp = false;
                    $scope.forumComment = '';
                    location.reload();
                }
            });
        };
        $scope.showDetail = function() {
            this.detail = !this.detail;
        };

        $scope.showPopUp = function() {
            $scope.popUp = true;
            postId = this.postId;
        };
        $scope.hidePopUp = function() {
            $scope.popUp = false;
            $scope.forumComment = '';
        };
    })
    //在线测试
    .controller('onlineQuizController', function($scope, $http) {
        $http.post('/main/?ct=api&method=quiz.getQuiz').success(function(response) {
            if (response.data.length == 0) {
                $scope.noOnlineQuiz = true;
                return;
            }
            $scope.quiz = response.data;
            $scope.quiz_id = response.data[0].quiz_id;
        });
        if (Util.getUserType() == 1) { //学生
            $scope.submit = function() {
                var quizList = $scope.quiz;
                if (confirm("请确保您的每一道题都已填写，确认提交？")) {
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
                    var totalScore = Util.getTotalScore(scoreList);
                    var username = Util.getUsername();
                    var quiz_id = $scope.quiz_id;
                    var date = (new Date()).toLocaleDateString();

                    var postData = {
                        scoreList: scoreList,
                        totalScore: totalScore,
                        username: username,
                        quiz_id: quiz_id
                    };
                    $http.post('/main/?ct=api&method=quiz.submitAnswer', postData).success(function(response) {
                        if (response.data == 1) {
                            alert("提交成功！本次测试您的得分为" + totalScore);
                            $scope.rightAnswer = true;
                        } else {
                            alert("本次测试已经结束");
                        }
                    });
                }

            };
        }


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

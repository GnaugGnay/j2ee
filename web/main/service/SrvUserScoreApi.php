<?php
class SrvUserScoreApi{
    //查询成绩
    public function pastScore($data) {
        $username = $data['username'];
        $mod = new ModUserscore();
        $re = $mod->getScore($username);
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }

    //统计每道题的正确率
    public function countCorrect($data) {
        $quiz_id = $data['quiz_id'];
        $mod = new ModUserscore();
        $re = $mod->getScoresOfQuiz($quiz_id);
        $scoreNum = $re['scoreNum'];
        $scoresTemp = array();
        foreach ($re['scores'] as $key => $value) {
            $value['scores'] = explode(',',$value['scores']);
            array_push($scoresTemp, $value['scores']);
        }
        function add($a ,$b) {
            return $a + $b;
        }
        function init() {
            return 0;
        }
        $correctRate = array_map('init', $scoresTemp[0]);
        foreach ($scoresTemp as $key => $value) {
            $correctRate = array_map('add', $correctRate ,$value);
        }
        foreach ($correctRate as $key => $value) {
            $correctRate[$key] = (round($value / $scoreNum , 4)*100)."%";
        }
        $result['correctRate'] = $correctRate;
        $result['scoreNum'] = $scoreNum;
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $result);
    }

    //返回学生名单信息
    public function getStuList() {
        $modUser = new ModUser();
        $username = $modUser->getStudents();
        $modQuiz = new ModQuiz();
        $quizs = $modQuiz->getPastQuiz();
        $modUserscore = new ModUserscore();

        $temp = [];
        foreach ($quizs as $key => $value) {
            array_push($temp,$value['quiz_time']);
        }
        $result['quiz_times'] = array_reverse($temp);

        // 已进行了多少场测试
        foreach ($quizs as $key => $value) {
            $arr = explode(',', $value['question_ids']);
            $length += count($arr);
        }
        $listData = [];
        foreach ($username as $key => $value) {
            $re = $modUserscore->getTotalscore($value['username']);
            $temp2['username'] = $value['username'];
            $temp2['fullname'] = $value['fullname'];
            $temp2['totalscore'] = [];
            $finalscore = 0;
            foreach ($re as $key2 => $value2) {
                array_push($temp2['totalscore'], $value2['totalscore']);
                $finalscore += round(($value2['totalscore'] / $length) * 100);
            }
            $temp2['finalscore'] = $finalscore;
            array_push($listData,$temp2);
        }
        $result['listData'] = $listData;


        
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $result);

    }

}

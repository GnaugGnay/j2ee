<?php

class SrvQuizApi{
    
    // 拿到全部试题
    public function getQuiz() {
        $mod = new ModQuiz();
        $re = $mod->getAll();
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }

    //提交答案
    public function submitAnswer($data) {
        $mod = new ModQuiz();
        $re = $mod->getAll();
        if (count($re) == 0) {
            return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, false);
        }
    	$username = $data['username'];
        $quiz_id = $data['quiz_id'];
        $scores = $data['scoreList'];
        $totalscore = $data['totalScore'];
        $re = $mod->submitAnswer($username, $quiz_id, $scores, $totalscore);
    	return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, 1);
    }

    //查找以往的测试
    public function getPastQuiz() {
        $mod = new ModQuiz();
        $re = $mod->getPastQuiz();
        foreach ($re as $key => $value) {
            $que_ids = $value['question_ids'];
            $questions = $mod->searchQuestionsOnly($que_ids);
            $re[$key]['questions'] = $questions;
        }
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }

    //添加试题到pastQuiz
    public function addToPastQuiz($data) {
        $question_ids = $data['question_ids'];
        $mod = new ModQuiz();
        $re = $mod->insertPastQuiz($question_ids);
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }
    // 发布在线测试
    public function releaseQuiz($data) {
        set_time_limit (0);
        
        $quiz_id = $data['quiz_id'];
        $quizTime = (int)$data['quizTime'];
        $date = date("Y-m-d");
        $mod = new ModQuiz();
        $re = $mod->updateDate($date,$quiz_id);
        $question_ids = $re[0]['question_ids'];
        $re = $mod->insertOnlineQuiz($question_ids,$quiz_id);
        $modUser = new ModUser();
        $students = $modUser->getStudents();
        foreach ($students as $key => $value) {
            $mod->insertScore($value['username'],$quiz_id,$date,'',0);
        }
        sleep($quizTime);
        $re = $mod->deleteOnlineQuiz();
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }

    //结束当前的在线测试
    public function closeOnlineQuiz() {
        $mod = new ModQuiz();
        $re = $mod->deleteOnlineQuiz();
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }
}

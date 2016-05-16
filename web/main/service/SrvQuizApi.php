<?php
/**
 * Created by PhpStorm.
 * User: hzm
 * Date: 2015/10/22
 * Time: 16:36
 */

class SrvQuizApi{
    
    // 拿到全部试题
    public function getQuiz() {
        $mod = new ModQuiz();
        $re = $mod->getAll();
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }

    //插入成绩
    public function insertScore($data) {
        $mod = new ModQuiz();
        $re = $mod->getAll();
        if ($re.length == 0) {
            return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, false);
        }
    	$username = $data['username'];
        $quiz_id = $data['quiz_id'];
        $date = date("Y-m-d");
        $scores = $data['scoreList'];
        $totalscore = $data['totalScore'];
        $re = $mod->insertScore($username, $quiz_id, $date, $scores, $totalscore);
    	return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
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
        $quiz_id = $data['quiz_id'];
        $date = date("Y-m-d");
        $mod = new ModQuiz();
        $re = $mod->updateDate($date,$quiz_id);
        $question_ids = $re[0]['question_ids'];
        $re = $mod->insertOnlineQuiz($question_ids,$quiz_id);
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }

}

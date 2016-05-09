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
    	$username = $data['username'];
        $quiz_id = $data['quiz_id'];
        $date = date("Y-m-d");
        $scores = $data['scoreList'];
        $totalscore = $data['totalScore'];
        $re = $mod->insertScore($username, $quiz_id, $date, $scores, $totalscore);
    	return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }

    //test
    public function test($data) {
        $question_ids = $data['question_ids'];
        $date = $data['date'];
        $mod = new ModQuiz();
        $re = $mod->insertPastQuiz($question_ids,$date);
        $quiz_id = $re[0]['@@IDENTITY'];
        // $re = $mod->searchQuestions($question_ids);
        // return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }

}

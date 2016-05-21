<?php

class ModQuiz extends Model{
    public function __construct(){
        $this->conn = 'j2ee';
        $this->table_onlinequiz = 'onlinequiz';
        $this->table_userscore = 'userscore';
        $this->table_questions = 'questions';
    }

    // 拿到全部试题
    public function getAll() {
        $sql = "select * from `{$this->table_onlinequiz}`";
        return $this->query($sql);
    }

    //插入成绩
    public function insertScore($username, $quiz_id, $date, $scores, $totalscore) {
    	$sql = "insert into `j2ee`.`{$this->table_userscore}` (`username`, `quiz_id`, `quiz_time`, `scores`, `totalscore`) VALUES ('{$username}', '{$quiz_id}', '{$date}', '{$scores}', '{$totalscore}')";
        return $this->query($sql);
    }

    // 提交答案
    public function submitAnswer($username, $quiz_id,$scores, $totalscore) {
        $sql = "update `userscore` SET `scores`='{$scores}',`totalscore`='{$totalscore}' WHERE `username`='{$username}' and `quiz_id`='{$quiz_id}'";
        return $this->query($sql);
    }
    //查找questions中若干条题目
    public function searchQuestions($question_ids) {
        $sql = "select * from `{$this->table_questions}` WHERE `question_id` in ({$question_ids})";
        return $this->query($sql);
    }
    //查找questions中若干条题目,仅题目
    public function searchQuestionsOnly($question_ids) {
        $sql = "select question from `{$this->table_questions}` WHERE `question_id` in ({$question_ids})";
        return $this->query($sql);
    }

    //查找以往的测试
    public function getPastQuiz() {
        $sql = "select * FROM `pastquiz` ORDER BY `quiz_time` DESC";
        return $this->query($sql);
    }

    //将question_ids插入pastquiz表中，记录以往的测试(待发布)
    public function insertPastQuiz($question_ids) {
        $sql = "insert INTO `pastquiz`(`question_ids`) VALUES ('{$question_ids}')";
        return $this->query($sql);
    }

    //发布测试更新时间并返回question_ids
    public function updateDate($date,$quiz_id) {
        $sql = "update `pastquiz` SET `quiz_time`='{$date}' WHERE `quiz_id` = '{$quiz_id}'";
        $this->query($sql);
        $sql = "select `question_ids` FROM `pastquiz` WHERE `quiz_id` = '{$quiz_id}'";
        return $this->query($sql);
    }
    //先删除之前的试题，然后将question_ids插入onlinequiz表中并将quiz_id改为相应的，供学生测试用
    public function insertOnlineQuiz($question_ids, $quiz_id) {
        $sql = "delete FROM `onlinequiz` WHERE 1";
        $this->query($sql);
        $sql = "insert INTO `onlinequiz`(`question_id`,`question_type`, `question`, `A`, `B`, `C`, `D`, `answer`) SELECT `question_id`,`question_type`, `question`, `A`, `B`, `C`, `D`, `answer` FROM `questions` WHERE `question_id` in ({$question_ids})";
        $this->query($sql);
        $sql = "update `onlinequiz` SET `quiz_id`= {$quiz_id} WHERE 1";
        return $this->query($sql);
    }

    //删除在线测试的试题
    public function deleteOnlineQuiz() {
        $sql = "delete FROM `onlinequiz` WHERE 1";
        return $this->query($sql);
    }

}

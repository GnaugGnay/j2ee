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

    //查找questions中若干条题目
    public function searchQuestions($question_ids) {
        $sql = "select * from `{$this->table_questions}` WHERE `question_id` in ({$question_ids})";
        return $this->query($sql);
    }

    //将question_ids插入pastquiz表中，记录以往的成绩
    public function insertPastQuiz($question_ids, $date) {
        $sql = "insert INTO `pastquiz`(`question_ids`, `quiz_time`) VALUES ('{$question_ids}', '{$date}')";
        $this->query($sql);
        $sql = "select @@IDENTITY";
        return $this->query($sql);
    }
}

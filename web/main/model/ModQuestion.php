<?php

class ModQuestion extends Model{
    public function __construct(){
        $this->conn = 'j2ee';
        $this->table_questions = 'questions';
    }

    //根据章节来选择相应的试题
    public function getQuestions($section_id) {
        $sql = "select * FROM `questions` WHERE `section_id` = {$section_id} order by `question_type`";
        return $this->query($sql);
    } 
    //添加题目到试题库
    public function addQuestion($section_id, $question_type, $question, $A, $B, $C, $D, $answer) {
    	$sql = "insert INTO `questions`(`section_id`, `question_type`, `question`, `A`, `B`, `C`, `D`, `answer`) VALUES ('{$section_id}','{$question_type}','{$question}','{$A}','{$B}','{$C}','{$D}','{$answer}')";
        return $this->query($sql);
    }
}

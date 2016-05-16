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
}

<?php

class SrvQuestionApi{
    
    //根据章节来选择相应的试题
    public function getQuestions($data) {
        $section_id = $data['section_id'];
        $mod = new ModQuestion();
        $re = $mod->getQuestions($section_id);
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    } 

    //手动添加试题
    public function addQuestion($data) {
        $section_id = $data['section_id'];
        $question_type = $data['question_type'];
        $question = $data['question'];
        $A = $data['A'];
        $B = $data['B'];
        $C = $data['C'];
        $D = $data['D'];
        $answer = $data['answer'];
        $mod = new ModQuestion();
        $re = $mod->addQuestion($section_id, $question_type, $question, $A, $B, $C, $D, $answer);

        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }

}

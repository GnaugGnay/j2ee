<?php
/**
 * Created by PhpStorm.
 * User: hzm
 * Date: 2015/10/22
 * Time: 16:36
 */

class SrvQuestionApi{
    
    //根据章节来选择相应的试题
    public function getQuestions($data) {
        $section_id = $data['section_id'];
        $mod = new ModQuestion();
        $re = $mod->getQuestions($section_id);
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    } 

}

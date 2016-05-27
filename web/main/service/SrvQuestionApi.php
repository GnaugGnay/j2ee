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

    //删除试题
    public function delQuestions($data) {
        $question_ids = $data['question_ids'];
        $mod = new ModQuestion();
        $re = $mod->delQuestions($question_ids);
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    } 

    //从EXCEL导入试题
    public function importQuestion() {
        ini_set('memory_limit','256M');

        $name = $_FILES['filename']['name'];
        $tmp_name = $_FILES['filename']['tmp_name'];
        $size = $_FILES['filename']['size'];
        $upload = LibFile::uploadByFile($name, $tmp_name,$size, WEB_ROOT.'/uploads/user', WEB_ROOT.'/uploads/user', 2048, array('.xls','.xlsx'),$name);

        if(!$upload['state']) return array('state'=>0,'msg'=>$upload['msg']);
        require LIB.'/library/excel/PHPExcel.php';
        $objPHPExcel = PHPExcel_IOFactory::load($upload['file']);
        $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

        $mod = new ModQuestion();

        foreach($sheetData as $key => $data) {
            if ($key == 1) continue;
            $section_id = $data['A'];
            $question_type = $data['B'];
            $question = $data['C'];
            $A = $data['D'];
            $B = $data['E'];
            $C = $data['F'];
            $D = $data['G'];
            $answer = $data['H'];
            $mod->addQuestion($section_id, $question_type, $question, $A, $B, $C, $D, $answer);
        }

        return array('state'=>1,'msg'=>'插入成功');
    }
}

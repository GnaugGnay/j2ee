<?php
/**
 * Created by PhpStorm.
 * User: hzm
 * Date: 2015/10/22
 * Time: 16:36
 */

class SrvUserApi{
    // 登录
    public function login($data) {
        $mod = new ModUser();
        $username = $data['username'];
        $password = $data['password'];
        $re = $mod->login($username, $password);
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }
    // 修改密码
    public function changePassword($data) {
        $mod = new ModUser();
        $username = $data['username'];
        $oldPassword = $data['oldPassword'];
        $newPassword = $data['newPassword'];
        $re = $mod->login($username, $oldPassword);
        if(count($re) == 0) {
            return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
        } else {
            $re = $mod->changePassword($username, $newPassword);
            return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
        }
    }
    //导入EXCEL到user表，学期开始时操作
    public function importUser(){
        ini_set('memory_limit','256M');

        $name = $_FILES['filename']['name'];
        $tmp_name = $_FILES['filename']['tmp_name'];
        $size = $_FILES['filename']['size'];
        $upload = LibFile::uploadByFile($name, $tmp_name,$size, WEB_ROOT.'/uploads/user', WEB_ROOT.'/uploads/user', 2048, array('.xls','.xlsx'),$name);

        if(!$upload['state']) return array('state'=>0,'msg'=>$upload['msg']);
        require LIB.'/library/excel/PHPExcel.php';
        $objPHPExcel = PHPExcel_IOFactory::load($upload['file']);
        $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

        $mod = new ModUser();
        foreach($sheetData as $key => $data) {
            if ($key == 1) continue;
            $username = $data['A'];
            $fullName = $data['B'];
            $mod->addUser($username, $fullName);
        }

        return array('state'=>1,'msg'=>'插入成功');
    }
    //查询成绩
    public function pastScore($data) {
        $username = $data['username'];
        $mod = new ModUserscore();
        $re = $mod->getScore($username);
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }

    //统计每道题的正确率
    public function countCorrect($data) {
        $quiz_id = $data['quiz_id'];
        $mod = new ModUserscore();
        $re = $mod->getScoresOfQuiz($quiz_id);
        $scoreNum = $re['scoreNum'];
        $scoresTemp = array();
        foreach ($re['scores'] as $key => $value) {
            $value['scores'] = explode(',',$value['scores']);
            array_push($scoresTemp, $value['scores']);
        }
        function add($a ,$b) {
            return $a + $b;
        }
        function init() {
            return 0;
        }
        $correctRate = array_map('init', $scoresTemp[0]);
        foreach ($scoresTemp as $key => $value) {
            $correctRate = array_map('add', $correctRate ,$value);
        }
        foreach ($correctRate as $key => $value) {
            $correctRate[$key] = (round($value / $scoreNum , 4)*100)."%";
        }
        $result['correctRate'] = $correctRate;
        $result['scoreNum'] = $scoreNum;
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $result);
    }
         
    //结束当前的在线测试
    public function closeOnlineQuiz() {
        $mod = new ModQuiz();
        $re = $mod->deleteOnlineQuiz();
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }
}

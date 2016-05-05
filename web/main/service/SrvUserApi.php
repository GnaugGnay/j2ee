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

    public function importUser(){
        ini_set('memory_limit','256M');

        $name = $_FILES['filename']['name'];
        $tmp_name = $_FILES['filename']['tmp_name'];
        $size = $_FILES['filename']['size'];
        $upload = LibFile::uploadByFile($name, $tmp_name,$size, WEB_ROOT.'/uploads/user', WEB_ROOT.'/uploads/user', 2048, array('.xls','.xlsx'));

        if(!$upload['state']) return array('state'=>0,'msg'=>$upload['msg']);
        require LIB.'/library/excel/PHPExcel.php';
        $objPHPExcel = PHPExcel_IOFactory::load($upload['file']);
        $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

        $mod = new ModUser();
        foreach($sheetData as $key => $data) {
            if ($key == 1) continue;
            $username = $data['A'];
            $mod->addUser($username);
        }

        return array('state'=>1,'msg'=>'插入成功');
    }

}

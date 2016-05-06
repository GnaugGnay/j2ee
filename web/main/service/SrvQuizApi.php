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

    //functionTest
    public function test($data) {
    	return $data['scoreList'];
    }

}

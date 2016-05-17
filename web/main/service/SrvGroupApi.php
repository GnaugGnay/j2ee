<?php
/**
 * Created by PhpStorm.
 * User: hzm
 * Date: 2015/10/22
 * Time: 16:36
 */

class SrvGroupApi{

    // 获取全部分组
    public function getGroups() {
        $mod = new ModGroup();
        $re = $mod->getAll();
        foreach ($re as $key => $value) {
            $re[$key]['group_member'] = json_decode($value['group_member']);
        }
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }

    //加入小组
    public function enterGroup($data) {
        $group_id = $data['group_id'];
        $username = $data['username'];
        $name = $data['name'];
        $mod = new ModGroup();
        $re = $mod->getGroup($group_id);
        $group_member = json_decode($re[0]['group_member'],true);
        foreach ($group_member as $key => $value) {
            if ($value['username'] == '') {
                $i = $key;
                break;
            }
        }
        if (is_null($i)) {
            return array('msg'=>'此小组已经满员');
        } else {
            $group_member[$i]['username'] = $username;
            $group_member[$i]['name'] = $name;
            $group_member = json_encode($group_member,JSON_UNESCAPED_UNICODE);
            if ($re[0]['group_leader'] == '') {
                $re = $mod->insertIntoGroup($group_id, $group_member, $username);
            } else {
                $re = $mod->insertIntoGroup($group_id, $group_member, '');
            }
            $mod->updateGroupId($username,$group_id);
            return array('msg'=>'加入成功','state'=>true);
        }
    }
    //获取小组成员
    public function getGroupMember($data) {
        $group_id = $data['group_id'];
        $mod = new ModGroup();
        $re = $mod->getGroup($group_id);
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }

    //生成新分组
    public function createGroups($data) {
        $numPerGroup = $data['number'];
        $str = '{"username":"","name":""}';
        $modUser = new ModUser();
        $mod = new ModGroup();
        $totalNum = $modUser->countPeople()[0]['count(*)'];
        if ($numPerGroup > $totalNum) {
            return array('msg'=>"每组人数不能大于总人数");
        }
        for ($i=0; $i < $numPerGroup; $i++) { 
            if ($i == 0) {
                $group_member .= $str;
            } else {
                $group_member .= ',' . $str;
            }
        }
        $group_member = '[' . $group_member . ']';
        $groupNum = (int)ceil($totalNum / $numPerGroup);
        for ($i=0; $i < $groupNum; $i++) { 
            $mod->insertEmpty($group_member);
        }
        $re = $mod->getAll();
        return LibUtil::reData(Code::$CODE_SYSTEM_ERROR, $re);
    }

}

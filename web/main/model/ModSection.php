<?php

class ModSection extends Model{
    public function __construct(){
        $this->conn = 'j2ee';
        $this->table_sections = 'sections';
    }

    // 得到章节目录(老师)
    public function getSections() {
        $sql = "select `section_id` FROM `{$this->table_sections}`";
        return $this->query($sql);
    } 

    // 得到章节目录(学生)
    public function getSectionsStu() {
        $sql = "select `section_id` FROM `{$this->table_sections}` where `isOpen` = '1'";
        return $this->query($sql);
    }
    
    //开放章节
    public function openSection($section_id) {
        $sql = "update `sections` SET `isOpen`= '1' WHERE `section_id` = '{$section_id}'";
        return $this->query($sql);
    } 

    //关闭章节，不对学生开放
    public function closeSection($section_id) {
        $sql = "update `sections` SET `isOpen`= '0' WHERE `section_id` = '{$section_id}'";
        return $this->query($sql);
    } 
}

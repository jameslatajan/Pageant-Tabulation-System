<?php

class Config_model extends CI_Model
{
    public function get_pageant_name()
    {
        $this->db->select('id');
        $this->db->select('configName');
        $this->db->select('value');
        $this->db->from('config');
        $this->db->where('configName', 'Pageant Name');
        return $this->db->get()->row();
    }

    public function isFinals()
    {
        $this->db->select('id');
        $this->db->select('configName');
        $this->db->select('value');
        $this->db->from('config');
        $this->db->where('configName', 'Finals');
        return $this->db->get()->row();
    }

    public function isSemiFinals()
    {
        $this->db->select('id');
        $this->db->select('configName');
        $this->db->select('value');
        $this->db->from('config');
        $this->db->where('configName', 'Semifinals');
        return $this->db->get()->row();
    }

    public function isAutoRefresh()
    {
        $this->db->select('id');
        $this->db->select('configName');
        $this->db->select('value');
        $this->db->from('config');
        $this->db->where('configName', 'isAutoRefresh');
        return $this->db->get()->row();
    }

    public function judgeDivisor()
    {
        $this->db->select('id');
        $this->db->select('configName');
        $this->db->select('value');
        $this->db->from('config');
        $this->db->where('configName', 'Judges Divisor');
        return $this->db->get()->row();
    }

    public function categoryDivisor()
    {
        $this->db->select('id');
        $this->db->select('configName');
        $this->db->select('value');
        $this->db->from('config');
        $this->db->where('configName', 'Category Divisor');
        return $this->db->get()->row();
    }

    public function showInterview()
    {
        $this->db->select('id');
        $this->db->select('configName');
        $this->db->select('value');
        $this->db->from('config');
        $this->db->where('configName', 'Show Interview Result');
        return $this->db->get()->row();
    }
}

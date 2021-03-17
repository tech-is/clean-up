<?php
class Place_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function find($user_id, $id)
    {
        return $this->db->where('id')
            ->get('place')
            ->row_array();
    }

    public function findAll($user_id)
    {
        return $this->db->get('place')
            ->result_array();
    }

    public function insert($data, $user_id)
    {
        $this->db->insert('place',$data, $user_id);
        return $this->db->insert_id();
    }

    public function update($user_id, $id, $data)
    {
        $this->db->where('id', $id)
            ->update('user', $data, $user_id);
    }

    public function delete($id, $user_id)
    {
        $this->db->where('id', $id)
            ->delete();
    }
}

<?php
class Place_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function find($id)
    {
        return $this->db->where('id', $id)
            ->get('place')
            ->row_array();
    }

    public function findAll($user_id)
    {
        return $this->db->where('user_id', $user_id)
            ->get('place')
            ->result_array();
    }

    public function insert($data)
    {
        $this->db->insert('place', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id)
            ->update('place', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id)
            ->delete('place');
    }
}

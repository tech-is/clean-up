<?php
class Item_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function find($id, $user_id, $place_id)
    {
        return $this->db->where('id', $id)
            ->get('item')
            ->row_array();
    }

    public function findAll($user_id, $place_id)
    {
        return $this->db->get('item')
            ->result_array();
    }

    public function insert($data, $user_id, $place_id)
    {
        $this->db->insert('item', $data, $user_id, $place_id);
        return $this->db->insert_id();
    }

    public function update($id, $user_id, $place_id, $data)
    {
        $this->db->where('id', $id)
            ->update('user', $data, $user_id, $place_id);
    }

    public function delete($id, $user_id, $place_id)
    {
        $this->db->where('id', $id, $user_id, $place_id)
            ->delete();
    }
}

<?php
class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function find($id)
    {
        return $this->db->where('id', $id)
            ->get('user')
            ->row_array();
    }

    public function findByMail($mail)
    {
        return $this->db->where('mail', $mail)
            ->get('user')
            ->row_array();
    }

    public function findAll()
    {
        return $this->db->get('user')
            ->result_array();
    }

    public function insert($data)
    {
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id)
            ->update('user', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id)
            ->delete();
    }
}

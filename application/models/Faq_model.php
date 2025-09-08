<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faq_model extends CI_Model
{
    public function get_all()
    {
        return $this->db->order_by('id', 'DESC')->get('faqs')->result_array();
    }

    public function insert($data)
    {
        return $this->db->insert('faqs', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('faqs', $data);
    }

    public function delete($id)
    {
        return $this->db->where('id', $id)->delete('faqs');
    }

    public function get($id)
    {
        return $this->db->get_where('faqs', ['id' => $id])->row_array();
    }
}

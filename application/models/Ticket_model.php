<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ticket_model extends CI_Model
{
    public function get_by_user($user_id)
    {
        return $this->db->where('user_id', $user_id)
                        ->order_by('id','DESC')
                        ->get('tickets')
                        ->result_array();
    }

    public function get_all()
    {
        return $this->db->order_by('id','DESC')->get('tickets')->result_array();
    }

    public function get_ticket($id)
    {
        return $this->db->where('id',$id)->get('tickets')->row_array();
    }

    public function insert($data)
    {
        $this->db->insert('tickets',$data);
        return $this->db->insert_id();
    }

    public function update_status($id,$status)
    {
        return $this->db->where('id',$id)->update('tickets',['status'=>$status]);
    }
}

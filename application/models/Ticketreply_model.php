<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ticketreply_model extends CI_Model
{
    public function get_by_ticket($ticket_id)
    {
        return $this->db->where('ticket_id',$ticket_id)
                        ->order_by('id','ASC')
                        ->get('ticket_replies')
                        ->result_array();
    }

    public function insert($data)
    {
        return $this->db->insert('ticket_replies',$data);
    }
}

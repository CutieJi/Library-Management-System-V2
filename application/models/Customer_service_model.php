<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_service_model extends CI_Model
{
    public function getAllTickets()
    {
        $this->db->select('customer_tickets.*, CONCAT(user_data.first_name," ",user_data.last_name) as member_name');
        $this->db->from('customer_tickets');
        $this->db->join('user_data', 'user_data.id = customer_tickets.user_id');
        $this->db->order_by('customer_tickets.created_at', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getTicketsByUser($user_id)
    {
        return $this->db->order_by('created_at', 'DESC')
                        ->get_where('customer_tickets', ['user_id' => $user_id])
                        ->result_array();
    }

    public function getTicketById($id)
    {
        $this->db->select('customer_tickets.*, CONCAT(user_data.first_name," ",user_data.last_name) as member_name');
        $this->db->from('customer_tickets');
        $this->db->join('user_data', 'user_data.id = customer_tickets.user_id');
        $this->db->where('customer_tickets.id', $id);
        return $this->db->get()->row_array();
    }

    public function createTicket($data)
    {
        $this->db->insert('customer_tickets', $data);
        return $this->db->insert_id();
    }

    public function addReply($data)
    {
        $this->db->insert('customer_ticket_replies', $data);
    }

    public function getRepliesByTicketId($ticket_id)
    {
        return $this->db->order_by('created_at', 'ASC')
                        ->get_where('customer_ticket_replies', ['ticket_id' => $ticket_id])
                        ->result_array();
    }

    public function closeTicket($ticket_id)
    {
        $this->db->where('id', $ticket_id);
        $this->db->update('customer_tickets', ['status' => 'closed']);
    }
}

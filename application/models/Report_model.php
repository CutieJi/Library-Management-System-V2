<?php
class Report_model extends CI_Model {

    public function getBorrowedBooks() {
        return $this->db->where('status', 'borrowed')->get('transactions')->result();
    }

    public function getReturnedBooks() {
        return $this->db->where('status', 'returned')->get('transactions')->result();
    }

    public function getOverdueBooks() {
        $today = date('Y-m-d');
        return $this->db->where('due_date <', $today)
                        ->where('status', 'borrowed')
                        ->get('transactions')
                        ->result();
    }
}
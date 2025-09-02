<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Report_model');
    }

    // Show report page
    public function index() {
        $data['borrowed'] = $this->Report_model->getBorrowedBooks();
        $data['returned'] = $this->Report_model->getReturnedBooks();
        $data['overdue']  = $this->Report_model->getOverdueBooks();

        $this->load->view('reports/index', $data);
    }
}
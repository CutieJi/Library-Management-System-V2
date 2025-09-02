<?php
use Dompdf\Dompdf;
use Dompdf\Options;

class Report extends CI_Controller {

    public function generate()
    {
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        // Convert logo to Base64
        $logoPath = FCPATH . 'assets/img/logo.png';
        $logoData = file_get_contents($logoPath);
        $logoBase64 = 'data:image/png;base64,' . base64_encode($logoData);

        // Load data for view
        $data['returned_books'] = $this->book->getReturnedBooks();
        $data['user'] = $this->session->userdata('user');
        $data['logo'] = $logoBase64; // pass to view

        // Render view
        $html = $this->load->view('book/pdf_report_borrow_return', $data, true);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Download PDF
        $dompdf->stream("Borrowed_Returned_Report.pdf", ["Attachment" => true]);
    }
}
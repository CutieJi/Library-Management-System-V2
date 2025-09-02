<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
 * pdf_helper.php
 * - Attempts to require composer autoload and common third_party dompdf autoload locations.
 * - Supports both modern Options API or older set_option() API.
 */

$autoload_candidates = [
    FCPATH . 'vendor/autoload.php',
    APPPATH . '../vendor/autoload.php',
    APPPATH . 'third_party/dompdf/autoload.inc.php',
    FCPATH . 'application/third_party/dompdf/autoload.inc.php',
];

foreach ($autoload_candidates as $p) {
    if (file_exists($p)) {
        require_once $p;
        break;
    }
}

function pdf_create($html, $filename = 'report', $stream = TRUE)
{
    try {
        // Use fully-qualified class names so we don't fail at compile time
        if (class_exists('\Dompdf\Options')) {
            $options = new \Dompdf\Options();
            $options->set('isRemoteEnabled', true);
            $options->set('isHtml5ParserEnabled', true);
            $options->set('defaultFont', 'DejaVu Sans');
            $dompdf = new \Dompdf\Dompdf($options);
        } else {
            // older dompdf
            $dompdf = new \Dompdf\Dompdf();
            if (method_exists($dompdf, 'set_option')) {
                $dompdf->set_option('isRemoteEnabled', true);
                $dompdf->set_option('defaultFont', 'DejaVu Sans');
            }
        }

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        if ($stream) {
            $dompdf->stream($filename . ".pdf", ["Attachment" => 1]);
            exit;
        } else {
            return $dompdf->output();
        }
    } catch (\Throwable $e) {
        // log to CI logs and show a friendly message
        if (function_exists('log_message')) {
            log_message('error', 'PDF creation failed: ' . $e->getMessage());
        }
        // useful for debugging during dev:
        echo "<h3>PDF generation failed:</h3><pre>" . htmlspecialchars($e->getMessage()) . "</pre>";
        exit;
    }
}

<?php

$file = "/var/www/html/tarif_voce/storage/csv/".$_GET['f'];

if (file_exists($file)) {

    header('Content-Description: File Transfer');
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();

    readfile($file);
    exit;
} else {
    echo 'No file found : '.$file;
}
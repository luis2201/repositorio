<?php
    $url = explode("/", $_GET['url']);

    $pdf = $url[2];
    $file = DOC.$pdf;

    header('Content-type: application/pdf');
    header('Content-Disposition: inline; filename="' . $file . '"');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: ' . filesize($file));
    header('Accept-Ranges: bytes');

    @readfile($file);
?>

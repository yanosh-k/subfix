<?php

require('vendor/autoload.php');
require('lib/slugify.php');

// Check if the file was succesffully uploaded
if (isset($_FILES['input_file']) && $_FILES['input_file']['error'] === 0) {

    // Load the subtitles into a string
    $inputString    = file_get_contents($_FILES['input_file']['tmp_name']);
    $inputExtension = pathinfo($_FILES['input_file']['name'], PATHINFO_EXTENSION);
    
    // Check for encodings to convert
    $convertEncodings = ['windows-1251'];
    $inputWithoutAscii = preg_replace('/^[\x00-\x7F]+/', '', $inputString);
    $inputEncoding = strtolower(mb_detect_encoding($inputWithoutAscii, implode(',', $convertEncodings) . ',utf-8'));
    
    // Do the actual encoding convertion
    if (in_array($inputEncoding, $convertEncodings)) {
        $inputString = mb_convert_encoding($inputString, 'UTF-8', $inputEncoding);
    }
    
    // Load the file in the library
    $subtitles = \Done\Subtitles\Subtitles::loadFromString($inputString, $inputExtension);

    // Resync if needed
    if ($_POST['resync_time']) {
        $subtitles->shiftTime($_POST['resync_time']);
    }

    // Output as a file
    header('Content-Type: application/octet-stream');
    header('Content-Transfer-Encoding: Binary');
    header('Content-disposition: attachment; filename="' . strtolower(slug($_FILES['input_file']['name'])) . '.' . $_POST['output_format'] . '"');
    
    // Output the file content
    echo $subtitles->content($_POST['output_format']);
} else {
    die('Error while uploading file');
}
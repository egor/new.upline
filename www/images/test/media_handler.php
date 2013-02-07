<?php
header("Content-type: video/mp4");
$output_file=readfile($_SERVER['DOCUMENT_ROOT']."/video/exaple.mp4");
print $output_file;
?>
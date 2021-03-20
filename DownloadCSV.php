<?php

$generated_numbers = json_decode(base64_decode($_POST['generated_numbers']), true);
$generated_strings = json_decode(base64_decode($_POST['generated_strings']), true);
$classified = json_decode(base64_decode($_POST['classified']), true);

require_once('./OutputFormatter.php');

$output_formatter = new OutputFormatter();

echo $output_formatter->exportCSV($generated_numbers, $generated_strings, $classified, true);

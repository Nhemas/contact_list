<?php

require_once dirname(__DIR__, 1) . '/Database.php';

$database = new Database();

$query = 'INSERT INTO contacts(
    name, 
    phone, 
    timestamp) 
VALUES (
    "' . $_POST['name'] . '",
    "' . $_POST['phone'] . '",
    ' . time() . '
)';
$result = $database->query($query);

$output = array(
    'status' => 'ok',
    'output' => $result
);
echo json_encode($output);
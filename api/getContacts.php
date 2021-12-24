<?php

require_once dirname(__DIR__, 1) . '/Database.php';

$database = new Database();

$query = 'SELECT * FROM contacts';
$result = $database->query($query);

$data = array();
while ($line = $result->fetch_assoc()) {
    $line['timestamp'] = date('d.m.Y', $line['timestamp']);
    $data[] = $line;
}

$output = array(
    'status' => 'ok',
    'output' => $data
);
echo json_encode($output);
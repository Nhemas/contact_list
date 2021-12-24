<?php

require_once dirname(__DIR__, 1) . '/Database.php';

$database = new Database();

$query = 'DELETE FROM contacts WHERE id = ' . $_POST['contact_id'] . '';
$result = $database->query($query);

$output = array(
    'status' => 'ok',
    'output' => $query
);
echo json_encode($output);
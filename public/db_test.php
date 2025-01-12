<?php

$db = \Config\Database::connect();
$query = $db->query('SELECT * FROM students'); // Replace with your table name
$results = $query->getResultArray();

echo '<pre>';
print_r($results);
echo '</pre>';

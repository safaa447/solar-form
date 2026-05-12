
<?php

$data = json_decode(file_get_contents("php://input"), true);

$email = $data['email'];
$phone = $data['phone'];
$company = $data['company'];

/*
 هنا خاصك:
 - SOQL query فـ Salesforce
 SELECT Id FROM Lead WHERE Email = '...' OR Phone = '...'
*/

$exists = false; // غير مثال

echo json_encode(["exists" => $exists]);

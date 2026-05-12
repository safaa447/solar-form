<?php
header('Content-Type: application/json');

// نقرأ البيانات الجاية من JS
$data = json_decode(file_get_contents("php://input"), true);

// حماية من الأخطاء
$email   = isset($data['email']) ? trim(strtolower($data['email'])) : '';
$phone   = isset($data['phone']) ? trim($data['phone']) : '';
$company = isset($data['company']) ? trim(strtolower($data['company'])) : '';

// ⚠️ هنا (DEMO DATABASE)
// من بعد تقدر تربطيها بـ Salesforce API أو MySQL
$existingLeads = [
    [
        "email" => "test@gmail.com",
        "phone" => "0612345678",
        "company" => "solargroup"
    ],
    [
        "email" => "john@demo.com",
        "phone" => "0700000000",
        "company" => "tesla"
    ]
];

// function مقارنة
function normalize($value) {
    return strtolower(str_replace(' ', '', $value));
}

$exists = false;

// check duplicates
foreach ($existingLeads as $lead) {

    if (
        (!empty($email) && normalize($lead['email']) == normalize($email)) ||
        (!empty($phone) && normalize($lead['phone']) == normalize($phone)) ||
        (!empty($company) && normalize($lead['company']) == normalize($company))
    ) {
        $exists = true;
        break;
    }
}

// response JSON
echo json_encode([
    "exists" => $exists
]);

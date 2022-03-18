<?php

namespace Tripay;

require_once('../Tripay.php');

Config::$apiKey = 'DEV-hQvVQSyHuu3zojNWet1oSyjb447nVfMB6nSG5Kbe';
Config::$privateKey = 'GQSAa-Qll5B-YbeY1-f0AS8-WQCIF';
Config::$merchantCode = 'T9999';
Config::$isProduction = false;

try {
    $payload = [
        'code' => 'BRIVA',
        'pay_code' => '884489',
        'amount' => 1000000,
        'allow_html' => 1,
    ];
    $instructions = Instructions::getInstructions($payload);
    echo json_encode($instructions, true);
} catch (\Throwable $th) {
    echo $th->getMessage();
}

<?php

namespace Tripay;

require_once('../Tripay.php');

Config::$apiKey = 'DEV-hQvVQSyHuu3zojNWet1oSyjb447nVfMB6nSG5Kbe';
Config::$privateKey = 'GQSAa-Qll5B-YbeY1-f0AS8-WQCIF';
Config::$merchantCode = 'T9999';
Config::$isProduction = false;

try {
    $payload = [
        'page' => 1,
        'per_page' => 25,
        'sort' => 'asc',
        'status' => 'PAID',
    ];
    $listTransaksi = Merchant::getListTransaksi($payload);
    echo json_encode($listTransaksi);
} catch (\Throwable $th) {
    echo $th->getMessage();
}

<?php

namespace Tripay;

require_once('../Tripay.php');

Config::$apiKey = 'DEV-hQvVQSyHuu3zojNWet1oSyjb447nVfMB6nSG5Kbe';
Config::$privateKey = 'GQSAa-Qll5B-YbeY1-f0AS8-WQCIF';
Config::$merchantCode = 'T9999';
Config::$isProduction = false;

$reference = 'DEV-T999939117Z1PLQ';

try {
    $getDetail = Transaction::getDetailTransaksi($reference);
    echo json_encode($getDetail);
} catch (\Throwable $th) {
    echo $th->getMessage();
}

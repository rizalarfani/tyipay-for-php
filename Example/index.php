<?php

namespace Tripay;

require_once('../Tripay.php');

Config::$apiKey = 'DEV-hQvVQSyHuu3zojNWet1oSyjb447nVfMB6nSG5Kbe';
Config::$privateKey = 'GQSAa-Qll5B-YbeY1-f0AS8-WQCIF';
Config::$merchantCode = 'T9999';
Config::$isProduction = false;

try {
    $code = 'BRIVA';
    $getChanel = Merchant::getKalkulatorBiaya(10000, $code);
    echo json_encode($getChanel);
} catch (\Throwable $th) {
    echo $th->getMessage();
}

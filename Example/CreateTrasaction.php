<?php

namespace Tripay;

require_once('../Tripay.php');

Config::$apiKey = 'DEV-hQvVQSyHuu3zojNWet1oSyjb447nVfMB6nSG5Kbe';
Config::$privateKey = 'GQSAa-Qll5B-YbeY1-f0AS8-WQCIF';
Config::$merchantCode = 'T9999';
Config::$isProduction = false;

$amout = 100000;
$code = 'BRIVA';
$orders = [
    [
        'sku'         => 'FB-06',
        'name'        => 'Nama Produk 1',
        'price'       => 50000,
        'quantity'    => 1,
        'product_url' => 'https://tokokamu.com/product/nama-produk-1',
        'image_url'   => 'https://tokokamu.com/product/nama-produk-1.jpg',
    ],
    [
        'sku'         => 'FB-07',
        'name'        => 'Nama Produk 2',
        'price'       => 50000,
        'quantity'    => 1,
        'product_url' => 'https://tokokamu.com/product/nama-produk-1',
        'image_url'   => 'https://tokokamu.com/product/nama-produk-1.jpg',
    ],
];
try {
    $trasaction = Transaction::requestTransaksi(
        $amout,
        $code,
        'INV345675',
        'Rijal Arfani',
        'arfanirizal22@gmail.com',
        '0895339855278',
        $orders,
        '',
        'https://oase.poltektegal.ac.id/',
    );
    echo json_encode($trasaction);
} catch (\Throwable $th) {
    echo $th->getMessage();
}

<?php

// Chek Version PHP
if (version_compare(PHP_VERSION, '5.4', '<')) {
    throw new Exception('PHP version >= 5.4 required');
}

// Check PHP Curl & json decode capabilities.
if (!function_exists('curl_init') || !function_exists('curl_exec')) {
    throw new Exception('Tripay Membutuhkan ekstensi CURL PHP');
}
if (!function_exists('json_decode')) {
    throw new Exception('Midtrans needs the JSON PHP extension.');
}

require_once('Tripay/Config.php');
require_once('Tripay/Merchant.php');
require_once('Tripay/Requestor.php');

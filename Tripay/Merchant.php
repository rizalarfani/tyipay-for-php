<?php

namespace Tripay;

class Merchant
{
    /**
     * Get Chanel Pembayaran
     * @param String $code code payment
     * @return mixed
     */
    public static function getChanelPembayaran($code = null)
    {
        ($code) ? $payload = ['code' => $code] : $payload = '';
        return Requestor::get(
            Config::getBaseUrl() . 'merchant/payment-channel',
            Config::$apiKey,
            $payload,
        );
    }

    /**
     * Get Kalkulator Biaya
     * @param int $ammout
     * @param String $code
     * 
     * @return mixed
     */
    public static function getKalkulatorBiaya($ammout, $code = null)
    {
        ($code) ? $payload = ['amount' => (int)$ammout, 'code' => $code] : ['amount' => (int)$ammout];
        return Requestor::get(
            Config::getBaseUrl() . 'merchant/fee-calculator',
            Config::$apiKey,
            $payload,
        );
    }

    /**
     * Get Daftar Transaksi
     * @param mixed $payload
     * 
     * @return mixed
     */
    public static function getListTransaksi($payload = null)
    {
        return Requestor::get(
            Config::getBaseUrl() . 'merchant/transactions',
            Config::$apiKey,
            ($payload) ? $payload : '',
        );
    }

    public static function getInstructions($payload = null)
    {
        return Requestor::get(
            Config::getBaseUrl() . 'payment/instruction',
            Config::$apiKey,
            ($payload) ? $payload : '',
        );
    }
}

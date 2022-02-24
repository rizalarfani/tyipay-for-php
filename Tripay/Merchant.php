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
        ($code) ? $url = Config::getBaseUrl() . 'merchant/payment-channel?code=' . $code : $url = Config::getBaseUrl() . 'merchant/payment-channel';
        return Requestor::get(
            $url,
            Config::$apiKey,
            $code,
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
            Config::getBaseUrl() . 'merchant/fee-calculator?' . http_build_query($payload),
            Config::$apiKey,
            $payload,
        );
    }

    /**
     * Get Daftar Transaksi
     * @param int $page
     * @param int $per_page
     * @param String $sort asc,desc
     * @param String $code
     * @param String $status
     */
    public static function getListTransaksi($page = 1, $per_page = 25, $sort = 'asc', $status = null)
    {
        $payload = [
            'page' => $page,
            'per_page' => $per_page,
            'sort' => $sort,
            'status' => $status
        ];
        return Requestor::get(
            Config::getBaseUrl() . 'merchant/transactions?' . http_build_query($payload),
            Config::$apiKey,
            $payload,
        );
    }
}

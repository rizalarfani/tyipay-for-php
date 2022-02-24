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
            $code
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
        ($code) ? $data = ['amount' => (int)$ammout, 'code' => $code] : ['amount' => (int)$ammout];
        return Requestor::get(
            Config::getBaseUrl() . 'merchant/fee-calculator?' . http_build_query($data),
            Config::$apiKey,
            $data,
        );
    }
}

<?php

namespace Tripay;

class Transaction
{

    /** Request Transaksi
     * 
     */
    public static function requestTransaksi($amount, $code, $merchantRef, $customerName, $customerEmail, $customerPhone, $orderDetail, $expired_time, $return_url)
    {
        $payload = [
            'method' => $code,
            'merchant_ref' => $merchantRef,
            'amount' => $amount,
            'customer_name' => $customerName,
            'customer_email' => $customerEmail,
            'customer_phone' => $customerPhone,
            'order_items' => $orderDetail,
            'return_url' => $return_url,
            'expired_time' => ($expired_time != '') ? $expired_time : (time() + (24 * 60 * 60)),
            'signature' => Transaction::generateSignature($merchantRef, $amount),
        ];
        return Requestor::post(
            Config::getBaseUrl() . 'transaction/create',
            Config::$apiKey,
            $payload
        );
    }


    /** GetDetailTransaksi
     * @param string $refernce
     * @return mixed[]
     * @throws Exception
     */
    public static function getDetailTransaksi($reference)
    {
        $payload = ['reference' => $reference];
        return Requestor::get(
            Config::getBaseUrl() . 'transaction/detail',
            Config::$apiKey,
            $payload,
        );
    }

    public static function generateSignature($merchantRef, $amount)
    {
        return hash_hmac('sha256', Config::$merchantCode . $merchantRef . $amount, Config::$privateKey);
    }
}

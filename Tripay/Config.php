<?php

namespace Tripay;

class Config
{
    /**  
     * Your api key for the Tripay
     * 
     * @static
     */
    public static $apiKey;

    /** 
     * Your private key for the tripay
     * @static
     */
    public static $privateKey;

    /** 
     * Your Merchant Code for the tripay
     * @static
     */
    public static $merchantCode;

    /** 
     * True For Mode Production
     * False For Mode sandbox
     * 
     * Defaul False
     */
    public static $isProduction = false;

    /**
     * Default options for every request
     * 
     * @static
     */
    public static $curlOptions = array();

    const API_PRODUCTION = 'https://tripay.co.id/api/';
    const API_SANDBOX = 'https://tripay.co.id/api-sandbox/';


    /** 
     * Get BaseUrl
     * 
     * @return string Midtrans API URL, depends on $isProduction
     */
    public static function getBaseUrl()
    {
        return Config::$isProduction ? Config::API_PRODUCTION : Config::API_SANDBOX;
    }
}

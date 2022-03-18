<?php

namespace Tripay;

use FFI\Exception;

class Requestor
{

    /**
     * Send Get Request
     */
    public static function get($url, $apiKey, $dataHash)
    {
        return Requestor::Call($url, $apiKey, $dataHash, 'GET');
    }

    public static function post($url, $apiKey, $dataHash)
    {
        return Requestor::Call($url, $apiKey, $dataHash, 'POST');
    }

    /**
     * send request to API server
     * 
     * @param string $url
     * @param string $apiKey
     * @param mixed[] $dataHash
     * @param bool $post
     * @return mixed
     * @throws Exception
     */
    public static function Call($url, $apiKey, $dataHash, $method)
    {
        $ch = curl_init();
        if (!$apiKey) {
            throw new Exception('ApiKey adalah null, Anda perlu mengatur api-key dari Config.');
        } else {
            if ($apiKey == '') {
                throw new Exception('Api key tidak boleh kosong, Harap isi apiKey');
            }
        }

        if ($method == 'GET') {
            if ($dataHash) $url .= '?' . http_build_query($dataHash);
        }
        $curl_options = array(
            CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json',
                'Authorization: Bearer ' . $apiKey,
            ),
            CURLOPT_FRESH_CONNECT => true,
            CURLOPT_RETURNTRANSFER => true
        );
        // merging with Config::$curlOptions
        if (count(Config::$curlOptions)) {
            if (Config::$curlOptions[CURLOPT_HTTPHEADER]) {
                $mergedHeaders = array_merge($curl_options[CURLOPT_HTTPHEADER], Config::$curlOptions[CURLOPT_HTTPHEADER]);
                $headerOptions = array(CURLOPT_HTTPHEADER => $mergedHeaders);
            } else {
                $mergedHeaders = array();
                $headerOptions = array(CURLOPT_HTTPHEADER => $mergedHeaders);
            }

            $curl_options = array_replace_recursive($curl_options, Config::$curlOptions, $headerOptions);
        }

        if ($method == 'POST') {
            $curl_options[CURLOPT_POST] = 1;
            if ($dataHash) {
                $curl_options[CURLOPT_POSTFIELDS] = json_encode($dataHash);
            }
        }

        curl_setopt_array($ch, $curl_options);
        $result = curl_exec($ch);

        if ($result === false) {
            throw new Exception('CURL Error: ' . curl_error($ch), curl_errno($ch));
        } else {
            try {
                $result_array = json_decode($result, true);
                return $result_array;
            } catch (\Throwable $th) {
                throw new Exception('API Request Error unable to json_decode API response: ' . $result . 'for Requset URL ' . $url);
            }
        }
    }
}

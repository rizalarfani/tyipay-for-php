<?php

namespace Tripay;

class Instructions
{

    /** getInsctuction
     * @param mixed $payload array
     * @return mixed
     */
    public static function getInstructions($payload = null)
    {
        return Requestor::get(
            Config::getBaseUrl() . 'payment/instruction',
            Config::$apiKey,
            ($payload) ? $payload : '',
        );
    }
}

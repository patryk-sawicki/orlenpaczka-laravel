<?php

/*Configuration file for Orlen Paczka API.*/

return [
    'api_id' => env('OP_API_ID', null),
    'api_key' => env('OP_API_KEY', null),
    'api_url' => env('OP_API_URL', 'https://api.orlenpaczka.pl/WebServicePwRProd/WebServicePwR.asmx?wsdl'),
    'sandbox_url' => env('OP_SANDBOX_URL', 'https://api-test.orlenpaczka.pl/WebServicePwR/WebServicePwR.asmx?WSDL'),

    'sandbox' => boolval(env('OP_SANDBOX', false)),

    /*Cache time*/
    'cache_time' => intval(env('OP_CACHE_DEFAULT_TTL', 86400)),
];
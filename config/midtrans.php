 <?php

    return [
        'clientKey' => env('MIDTRANS_CLIENT_KEY'),
        'serverKey' => env('MIDTRANS_SERVER_KEY'),
        'isProduction' => env('MIDTRANS_IS_PRODUCTION'),
        'isSanitized' => env('MIDTRANS_IS_SANITIZED'),
        'merchant_id' => env('MIDTRANS_MERCHANT_ID'),
        'is3ds' => env('MIDTRANS_IS_3DS'),
    ];

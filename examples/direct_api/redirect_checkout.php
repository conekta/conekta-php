<?php
require __DIR__ . '/../../vendor/autoload.php';

use Conekta\Api\OrdersApi;
use Conekta\ApiException;
use Conekta\Configuration;
use Conekta\Model\OrderRequest;

$apiKey = getenv("CONEKTA_API_KEY");
$config = Configuration::getDefaultConfiguration()->setAccessToken($apiKey);


$apiInstance = new OrdersApi(null, $config);
$accept_language = 'es';
$rq = new OrderRequest([
    'currency' => 'MXN',
    'customer_info' => [
        'name' => 'fran carrero',
        'email'=> 'framk@gmail.com',
        'phone' => '+5218181818181'
    ],
    'line_items' => [
        [
            'name' => 'Box of Cohiba S1s',
            'unit_price' => 35000,
            'quantity' => 1
        ]
    ],
    'shipping_lines' => [
        [
            'amount' => 1500,
            'carrier' => 'FEDEX'
        ]
    ],
    'checkout' => [
        'allowed_payment_methods' => [
            'bank_transfer',
            'card',
            'cash'
        ],
        'monthly_installments_enabled' => true,
        'type' => 'HostedPayment',
        'success_url' => 'https://www.example.com/success',
        'failure_url' => 'https://www.example.com/failure',
        'monthly_installments_options' => [3, 6, 12],
        'redirection_time' => 4 //Redirect time to Success-Failure URL, thresholds 4 to 120 sec.
    ],
    'shipping_contact' =>[
        'phone' => '+5218181818181',
        'receiver' => 'Marvin Fuller',
        'address' => [
            'street1' => '250 Alexis St',
            'city' => 'Red Deer',
            'state' => 'Alberta',
            'country' => 'CA',
            'postal_code' => '01000'
        ]
    ]
]);
try {
    $result = $apiInstance->createOrder($rq, $accept_language);
    $json_string = json_encode($result, JSON_PRETTY_PRINT);
    print_r($json_string);

    echo $result ->getCheckout()->getUrl();

} catch (ApiException $e) {
    echo 'Exception when calling OrdersApi->createOrder: ', $e->getMessage(), PHP_EOL;

}

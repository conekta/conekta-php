<?php
require __DIR__ . '/../../vendor/autoload.php';
use Conekta\Api\OrdersApi;
use Conekta\Configuration;
use Conekta\Model\OrderRequest;

$config = Configuration::getDefaultConfiguration()->setAccessToken(getenv("CONEKTA_API_KEY"));
$apiInstance = new OrdersApi(null, $config);


$rq = new OrderRequest([
    'line_items' => [
        [
            'name' => 'Nombre del Producto o Servicio',
            'unit_price' => 23000,
            'quantity' => 1
        ]
    ],
    'currency' => 'MXN',
    'customer_info' => [
       'name' => 'Jorge Martinez',
        'email' => 'jorge.martinez@conekta.com',
        'phone' => '+5218181818181'
    ],
    'metadata' => [
        'datos_extra' => '12334'
    ],
    'charges' => [
        [
            'payment_method' => [
                'type' => 'card',
                'number' => '4242424242424242',
                'name' => 'Jorge Martinez',
                'exp_month' => '12',
                'exp_year' => '2025',
                'cvc' => '198'
            ]
        ]
    ]
]);

try {
    $result = $apiInstance->createOrder($rq);
    $json_string = json_encode($result, JSON_PRETTY_PRINT);
    print_r($json_string);
} catch (Exception $e) {
    echo 'Exception when calling OrdersApi->createOrder: ', $e->getMessage(), PHP_EOL;

}

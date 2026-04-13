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
    'shipping_contact' => [
        'address' => [
            'street1' => 'Calle Falsa 123',
            'city' => 'Ciudad de México',
            'state' => 'CDMX',
            'country' => 'MX',
            'postal_code' => '01234'
        ],
        'phone' => '+5218181818181',
        'receiver' => 'Jorge Martinez'
    ],
    'shipping_lines' => [
        [
            'amount' => 1000,
            'carrier' => 'Estafeta',
            'tracking_number' => '1234567890'
        ]
    ],
    'charges' => [
        [
            'payment_method' => [
                'type' => 'bnpl',
                'product_type' => 'aplazo_bnpl',
                'success_url' => 'https://www.tu-sitio.com/success',
                'failure_url' => 'https://www.tu-sitio.com/failure',
                'cancel_url' => 'https://www.tu-sitio.com/cancel'
            ]
        ]
    ]
]);

try {
    $order = $apiInstance->createOrder($rq);
    $json_string = json_encode( $order, JSON_PRETTY_PRINT);
    print_r($json_string);
    print("order id" .  $order->getId());
    print("redirect url" .  $order->getCharges()->getData()[0]->getPaymentMethod()->getRedirectUrl());
    print("type" .  $order->getCharges()->getData()[0]->getPaymentMethod()->getType());
} catch (Exception $e) {
    echo 'Exception when calling OrdersApi->createOrder: ', $e->getMessage(), PHP_EOL;

}

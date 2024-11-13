<?php
require __DIR__ . '/../../vendor/autoload.php';
use Conekta\Api\OrdersApi;
use Conekta\ApiException;
use Conekta\Configuration;

$config = Configuration::getDefaultConfiguration()->setAccessToken(getenv("CONEKTA_API_KEY"));
$apiInstance = new OrdersApi(null, $config);

try {
    $result= $apiInstance->getOrderById('ord_2wxU5rd1J6po8TqVe');
    $json_string = json_encode($result, JSON_PRETTY_PRINT);
    print_r($json_string);
    print_r($result->getPaymentStatus());

} catch (ApiException $e) {
    echo 'Exception when calling OrdersApi->getOrderById: ', $e->getMessage(), PHP_EOL;
}

<?php
require __DIR__ . '/../../vendor/autoload.php';

use Conekta\Api\CustomersApi;
use Conekta\ApiException;
use Conekta\Configuration;
use Conekta\Model\Customer;

$apiKey =  getenv("CONEKTA_API_KEY");
$config = Configuration::getDefaultConfiguration()->setAccessToken($apiKey);

$apiInstance = new CustomersApi(null, $config);
$rq = new Customer([
    'name' => 'Franklin carrero',
    'email'=> 'mm@gmail.com',
    'phone' => '+5218181818181'
]);
try {
    $result = $apiInstance->createCustomer($rq);
    $json_string = json_encode($result, JSON_PRETTY_PRINT);
    print_r($json_string);
    echo $result ->getLivemode();
    echo $result ->getName();
    echo $result ->getEmail();
    echo $result ->getId();
    echo $result ->getObject();
} catch (ApiException $e) {
    echo 'Exception when calling CustomersApi->createCustomer: ', $e->getMessage(), PHP_EOL;
}

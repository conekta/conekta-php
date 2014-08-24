
![alt tag](https://raw.github.com/conekta/conekta-php/master/readme_files/cover.png)

# Conekta PHP v.1.9.9

This is a php library that allows interaction with https://api.conekta.io API.

## Installation

Obtain the latest version of the Conekta PHP bindings with:

    git clone https://github.com/conekta/conekta-php

To get started, add the following to your PHP script:

    require_once("/path/to/conekta-php/lib/Conekta.php");

You can also install this library with composer:

  require: "conekta/conekta-php": "dev-master"

## Usage
```php
Conekta::setApiKey('1tv5yJp3xnVZ7eK67m4h');
try {
  $charge = Conekta_Charge::create(array(
    "amount"=> 51000,
    "currency"=> "MXN",
    "description"=> "Pizza Delivery",
    "reference_id"=> "orden_de_id_interno",
    "card"=> $_POST['conektaTokenId']
    //"tok_a4Ff0dD2xYZZq82d9"
  ));
} catch (Conekta_Error $e) {
  echo $e->getMessage();
  //El pago no pudo ser procesado
}

{
  "id": "5286828b8ee31e64b7001739",
  "livemode": false,
  "created_at": 1384546955,
  "status": "paid",
  "currency": "MXN",
  "description": "Some desc",
  "reference_id": null,
  "failure_code": null,
  "failure_message": null,
  "object": "charge",
  "amount": 2000,
  "fee": 371,
  "payment_method": {
    "name": "Mario Moreno",
    "exp_month": "05",
    "exp_year": "15",
    "auth_code": "861491",
    "object": "card_payment",
    "last4": "4242",
    "brand": "visa"
  },
  "details": {
    "name": null,
    "phone": null,
    "email": null,
    "line_items": []
  }
}
```

## Documentation

Please see https://www.conekta.io/docs/api for up-to-date documentation.

## Tests

In order to run tests you have to install SimpleTest (https://github.com/simpletest/simpletest) via Composer (http://getcomposer.org/) (recommended way):

    composer.phar update --dev

Run test suite:

    php ./test/Conekta.php

License
-------
Developed by [Conekta](https://www.conekta.io). Available with [MIT License](LICENSE).

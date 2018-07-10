![README Cover Image](readme_cover.png)

# Conekta PHP v.4.0.4

This is a php library that allows interaction with https://api.conekta.io API.

## Installation

Obtain the latest version of the Conekta PHP bindings with:

    git clone https://github.com/conekta/conekta-php

To get started, add the following to your PHP script:

    require_once("/path/to/conekta-php/lib/Conekta.php");

You can also install this library with composer:

  require: "conekta/conekta-php": "4.0.4"

## Usage

```php
setApiKey();
$valid_order =
    array(
        'line_items'=> array(
            array(
                'name'        => 'Box of Cohiba S1s',
                'description' => 'Imported From Mex.',
                'unit_price'  => 20000,
                'quantity'    => 1,
                'sku'         => 'cohb_s1',
                'category'    => 'food',
                'tags'        => array('food', 'mexican food')
                )
           ),
          'currency'    => 'mxn',
          'metadata'    => array('test' => 'extra info'),
          'charges'     => array(
              array(
                  'payment_method' => array(
                      'type'       => 'oxxo_cash',
                      'expires_at' => strtotime(date("Y-m-d H:i:s")) + "36000"
                   ),
                   'amount' => 20000
                )
            ),
            'currency'      => 'mxn',
            'customer_info' => array(
                'name'  => 'John Constantine',
                'phone' => '+5213353319758',
                'email' => 'hola@hola.com'
            )
        );

try {
  $order = \Conekta\Order::create($valid_order);
} catch (\Conekta\ProcessingError $e){ 
  echo $e->getMessage();
} catch (\Conekta\ParameterValidationError $e){
  echo $e->getMessage();
} finally (\Conekta\Handler $e){
  echo $e->getMessage();
}
```

## Documentation

Please see [developers.conekta.com/api](https://developers.conekta.com/api) for up-to-date documentation.

## Run Tests

Unit test based on php library PHPUnit to describe better memory usage, test status and test results.

### Requeriments

PHPUnit 6.1 requires PHP 7; using the latest version of PHP is highly recommended.

### Installation
for better usage install phpunit globally

```
$ wget https://phar.phpunit.de/phpunit-6.1.phar

$ chmod +x phpunit-6.1.phar

$ sudo mv phpunit-6.1.phar /usr/local/bin/phpunit

$ phpunit --version

ej. output
PHPUnit 6.1.1 by Sebastian Bergmann and contributors.

```

php version used

```
PHP 7.0.17 (cli)
```

Run test suite:

```
phpunit test/Conekta-x.0
```

_note:_ for this phpunit version (6.1.x) only php 7 is supported for older php versions see phpunit <a href="https://phpunit.de/"> documentation</a>


## License

Developed in Mexico by [Conekta](https://www.conekta.com). Available with [MIT License](LICENSE).

***


## We are always hiring!

If you are a comfortable working with a range of backend languages (Java, Python, Ruby, PHP, etc) and frameworks, you have solid foundation in data structures, algorithms and software design with strong analytical and debugging skills.
Send your CV, github to quieroser@conekta.io


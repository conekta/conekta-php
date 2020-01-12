<div align="center">

![banner](readme_files/banner.png)

# Conekta PHP

![php badge](readme_files/php-badge.png)
![conekta badge](readme_files/conekta-badge.png)

</div>

This is a PHP library that allows interaction with [Conekta's API](https://api.conekta.io).

## Requeriments

PHPUnit ~8 requires PHP 7.2+; using the latest version of PHP is highly recommended.

## Installation

Obtain the latest version of the Conekta PHP bindings with:

    git clone https://github.com/conekta/conekta-php

To get started, add the following to your PHP script:

    require_once("/path/to/conekta-php/lib/Conekta.php");

You can also install this library with [Composer](https://github.com/composer/composer):

    require: "conekta/conekta-php": "4.2.0"

## Usage

```php
setApiKey();
$valid_order =
    [
        'line_items'=> [
            [
                'name'        => 'Box of Cohiba S1s',
                'description' => 'Imported From Mex.',
                'unit_price'  => 20000,
                'quantity'    => 1,
                'sku'         => 'cohb_s1',
                'category'    => 'food',
                'tags'        => ['food', 'mexican food']
            ]
        ],
        'currency' => 'mxn',
        'metadata' => ['test' => 'extra info'],
        'charges'  => [
            [
                'payment_method' => [
                    'type'       => 'oxxo_cash',
                    'expires_at' => strtotime(date("Y-m-d H:i:s")) + "36000"
                ],
                'amount' => 20000,
            ]
        ],
        'currency' => 'mxn',
        'customer_info' => [
            'name'  => 'John Constantine',
            'phone' => '+5213353319758',
            'email' => 'hola@hola.com',
        ]
    ];

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

Please visit the [official API reference](https://developers.conekta.com/api?language=php) for an up-to-date documentation.

## Run Tests

Unit test based on PHP library [PHPUnit](https://github.com/sebastianbergmann/phpunit) to describe better memory usage, test status and test results.

### Installing PHPUnit

For better usage install PHPUnit globally:

```bash
$ wget https://phar.phpunit.de/phpunit-8.5.2.phar

$ chmod +x phpunit-8.5.2.phar

$ sudo mv phpunit-8.5.2.phar /usr/local/bin/phpunit

$ phpunit --version

ej. output
PHPUnit 8.5.2 by Sebastian Bergmann and contributors.

```

PHP version used

```
PHP 7.4.24 (cli)
```

Run test suite:

```
phpunit test/Conekta-x.0
```

_note:_ for this PHPUnit version (8.x) only PHP 7.2+ is supported for older PHP versions see PHPunit <a href="https://phpunit.de/"> documentation</a>

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

1. Fork the repository

2. Clone the repository
```
    git clone git@github.com:yourUserName/conekta-php.git
```
3. Create a branch
```
    git checkout develop
    git pull origin develop
    # You should choose the name of your branch
    git checkout -b <feature/my_branch>
```
4. Make necessary changes and commit those changes
```
    git add .
    git commit -m "my changes"
```
5. Push changes to GitHub
```
    git push origin <feature/my_branch>
```
6. Submit your changes for review, create a pull request

   To create a pull request, you need to have made your code changes on a separate branch. This branch should be named like this: **feature/my_feature** or **fix/my_fix**.

   Make sure that, if you add new features to our library, be sure to add the corresponding **unit tests**.

   If you go to your repository on GitHub, you’ll see a Compare & pull request button. Click on that button.

***

## We are always hiring!

If you are a comfortable working with a range of backend languages (Java, Python, Ruby, PHP, etc) and frameworks, you have solid foundation in data structures, algorithms and software design with strong analytical and debugging skills, check our open positions: https://www.conekta.com/careers

---

## License

Developed in :mexico: Mexico by [Conekta](https://www.conekta.com). Available with [MIT License](LICENSE).

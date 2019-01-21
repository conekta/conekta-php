![README Cover Image](readme_cover.png)

<div align="center">

# Conekta PHP v.4.0.4

[![Made with PHP](https://img.shields.io/badge/made%20with-php-red.svg?style=for-the-badge&colorA=8892be&colorB=4f5b93&logo=php&logoColor=white)](https://php.net) 
[![By Conekta](https://img.shields.io/badge/by-conekta-red.svg?style=for-the-badge&colorA=ee6130&colorB=00a4ac)](https://conekta.com)
</div>

This is a PHP library that allows interaction with [Conekta's API](https://api.conekta.io).

## Requeriments

PHPUnit 6.1 requires PHP 7; using the latest version of PHP is highly recommended.

## Installation

Obtain the latest version of the Conekta PHP bindings with:

    git clone https://github.com/conekta/conekta-php

To get started, add the following to your PHP script:

    require_once("/path/to/conekta-php/lib/Conekta.php");

You can also install this library with [Composer](https://github.com/composer/composer):

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

Please visit the [official API reference](https://developers.conekta.com/api?language=php) for an up-to-date documentation.

## Run Tests

Unit test based on PHP library [PHPUnit](https://github.com/sebastianbergmann/phpunit) to describe better memory usage, test status and test results.

### Installing PHPUnit

For better usage install PHPUnit globally:

```bash
$ wget https://phar.phpunit.de/phpunit-6.1.phar

$ chmod +x phpunit-6.1.phar

$ sudo mv phpunit-6.1.phar /usr/local/bin/phpunit

$ phpunit --version

ej. output
PHPUnit 6.1.1 by Sebastian Bergmann and contributors.

```

PHP version used

```
PHP 7.0.17 (cli)
```

Run test suite:

```
phpunit test/Conekta-x.0
```

_note:_ for this PHPUnit version (6.1.x) only PHP 7 is supported for older PHP versions see PHPunit <a href="https://phpunit.de/"> documentation</a>


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

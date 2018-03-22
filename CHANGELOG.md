## [4.0.2](https://github.com/conekta/conekta-php/releases/tag/v4.0.1) - 2018-03-22
### Feature
- Support to Oxxo recurrent

## [4.0.1](https://github.com/conekta/conekta-php/releases/tag/v4.0.1) - 2017-12-29
### Feature
- Implement void action for orders

## [4.0.0](https://github.com/conekta/conekta-php/releases/tag/v4.0.0) - 2017-09-13
### Feature
- PHP 7 compatibility
- Rename \Conekta\Object to \Conekta\ConekatObject
- Rename \Conekta\Resource to \Conekta\ConektaResource
- Use phpunit.xml to organize tests

### Changed
- Apply namespace in tests

## [3.5.1](https://github.com/conekta/conekta-php/releases/tag/v3.5.1) - 2017-09-07
### Changed
- Refactorize tests functions code
- Update API Keys in tests

## [3.5.0](https://github.com/conekta/conekta-php/releases/tag/v3.5.0) - 2017-08-27
### Feature
- Delete payment source by id into Customer class
### Changed
- Certificate bundle for a public one
- Certificate update to include Conekta's own cert at the bottom

## [3.4.0](https://github.com/conekta/conekta-php/releases/tag/v3.4.0) 2017-08-16
### Feature
- Header structure identification for library/plugins 

## [3.3.0](https://github.com/conekta/conekta-php/releases/tag/v3.3.0) 2017-05-23
### Feature
- Multihandler exception implementation
### Changed
- PHPUnit Test integration
- CamelCase convention over variables

## [3.2.0](https://github.com/conekta/conekta-php/releases/tag/v3.2.0) 2017-02-15
### Feature
- FiscalEntity class
- OrderReturn class
### Changed
- Variable name  convention

## [3.1.0](https://github.com/conekta/conekta-php/releases/tag/v3.1.0) 2017-01-25
### Feature
- Supporting now API 2.0
### Changed
- Order's submodels added. New Order flow

## [3.0.0](https://github.com/conekta/conekta-php/releases/tag/v3.0.0) 2016-11-16
### Feature
- Add namespaces to master.

## [2.0.5](https://github.com/conekta/conekta-php/releases/tag/v2.0.5) 2016-07-05
### Feature
- Add Log model.

## [2.0.4](https://github.com/conekta/conekta-php/releases/tag/v2.0.4) 2016-02-23
### Changed
- Move Conekta_Language to Conekta folder.

## [2.0.3](https://github.com/conekta/conekta-php/releases/tag/v2.0.3) 2016-02-23
### Changed
- Language module to Conekta_Language.

## [2.0.1](https://github.com/conekta/conekta-php/releases/tag/v2.0.1) 2016-01-26
### Feature
- Complete specs for offline payments.
### Fix
- Fix Util.php for 'url' field name replacement.

## [2.0.0](https://github.com/conekta/conekta-php/releases/tag/v2.0.0) 2016-01-25
### Feature
- Add Webhook and WebhookLog models.
### Deleted
- Remove strpos warning in Object class.
### Fix
- Fix Charge specs.

## [1.9.9](https://github.com/conekta/conekta-php/releases/tag/v1.9.9) 2014-08-06
### Deleted
- Remove simpletest.
### Changed
- Change YAML to arrays.
- (Thanks to https://github.com/joecohens)

## [1.9.8](https://github.com/conekta/conekta-php/releases/tag/v1.9.8) 2014-05-22
### Feature
- Add Internationalization

## [1.9.7](https://github.com/conekta/conekta-php/releases/tag/v1.9.7) 2014-05-22
### Fix
- Throw an exception if PHP version is not supported.

## [1.9.6](https://github.com/conekta/conekta-php/releases/tag/v1.9.6) 2014-05-12
### Fix
- Return empty Object instead of empty array in Util.php

## [1.9.5](https://github.com/conekta/conekta-php/releases/tag/v1.9.5) 2014-04-28
### Feature
- Add classes for Address, Payee, Payout, PayoutMethod, Method.

## [1.9.4](https://github.com/conekta/conekta-php/releases/tag/v1.9.4) 2014-04-28
### Fix
- Fix Plan tests
### Feature
- Add Address, Payee, Payout, PayoutMethod, Method.
- Add Payout tests.

## [1.9.3](https://github.com/conekta/conekta-php/releases/tag/v1.9.3) 2014-04-2
### Fix
- Fix bugs in Resource.php.

## [1.9.2](https://github.com/conekta/conekta-php/releases/tag/v1.9.2) 2014-04-2
### Fix
- Fix bugs in Resource.php.

## [1.9.1](https://github.com/conekta/conekta-php/releases/tag/v1.9.1) 2013-01-21
### Feature
- Add setting version functionality.

## [1.9.0](https://github.com/conekta/conekta-php/releases/tag/v1.9.0) 2013-01-13

### Feature
- Add payment method model.
- Objects' properties are now accessible with the T_OBJECT_OPERATOR.
### Deprecated
- Deprecate retrieve and all methods and replaced them with find and where respectively.




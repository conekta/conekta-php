<?php
/**
 * BaseTestCase
 * PHP version 7.4
 */

namespace Conekta\Test\Api;

use Conekta\Configuration;
use PHPUnit\Framework\TestCase;

class BaseTestCase extends TestCase
{
    protected static Configuration $config;

    public static function setUpBeforeClass(): void
    {
        self::$config = Configuration::getDefaultConfiguration();
        $basePath = getenv('BASE_PATH');
        if ($basePath) {
            self::$config->setHost('http://' . $basePath);
        }
        self::$config->setApiKey('Bearer', 'key_test_mock');
    }
}

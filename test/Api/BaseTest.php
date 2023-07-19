<?php

namespace Conekta\Test\Api;

class BaseTest
{
    public static $host;
}
BaseTest::$host = getenv('BASE_PATH') ?: 'localhost:3000';

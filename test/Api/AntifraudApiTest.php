<?php
/**
 * AntifraudApiTest
 * PHP version 7.4
 */

namespace Conekta\Test\Api;

use Conekta\Api\AntifraudApi;
use Conekta\Model\BlacklistRuleResponse;
use Conekta\Model\CreateRuleWhitelistRequest;
use Conekta\Model\DeletedBlacklistRuleResponse;
use Conekta\Model\DeletedWhitelistRuleResponse;
use Conekta\Model\RiskRulesList;
use Conekta\Model\WhitelistlistRuleResponse;

class AntifraudApiTest extends BaseTestCase
{
    private function api(): AntifraudApi
    {
        return new AntifraudApi(null, self::$config);
    }

    public function testCreateRuleBlacklist()
    {
        $request = new CreateRuleWhitelistRequest([
            'description' => 'block this email',
            'field' => 'email',
            'value' => 'fcarrero_black@gmail.com',
        ]);

        $response = $this->api()->createRuleBlacklist($request);

        self::assertInstanceOf(BlacklistRuleResponse::class, $response);
        self::assertNotEmpty($response->getId());
        self::assertSame('email', $response->getField());
    }

    public function testCreateRuleWhitelist()
    {
        $request = new CreateRuleWhitelistRequest([
            'description' => 'allow this email',
            'field' => 'email',
            'value' => 'fcarrero@gmail.com',
        ]);

        $response = $this->api()->createRuleWhitelist('es', $request);

        self::assertInstanceOf(WhitelistlistRuleResponse::class, $response);
        self::assertNotEmpty($response->getId());
        self::assertSame('email', $response->getField());
    }

    public function testDeleteRuleBlacklist()
    {
        $response = $this->api()->deleteRuleBlacklist('618c3f30db8b8da9be376b1e');

        self::assertInstanceOf(DeletedBlacklistRuleResponse::class, $response);
        self::assertNotEmpty($response->getId());
    }

    public function testDeleteRuleWhitelist()
    {
        $response = $this->api()->deleteRuleWhitelist('618c3f2fdb8b8da9be376afe');

        self::assertInstanceOf(DeletedWhitelistRuleResponse::class, $response);
        self::assertNotEmpty($response->getId());
    }

    public function testGetRuleBlacklist()
    {
        $response = $this->api()->getRuleBlacklist();

        self::assertInstanceOf(RiskRulesList::class, $response);
        self::assertSame('list', $response->getObject());
        self::assertNotEmpty($response->getData());
    }

    public function testGetRuleWhitelist()
    {
        $response = $this->api()->getRuleWhitelist();

        self::assertInstanceOf(RiskRulesList::class, $response);
        self::assertSame('list', $response->getObject());
        self::assertNotEmpty($response->getData());
    }
}

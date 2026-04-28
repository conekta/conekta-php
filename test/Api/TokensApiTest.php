<?php
/**
 * TokensApiTest
 * PHP version 7.4
 */

namespace Conekta\Test\Api;

use Conekta\Api\TokensApi;
use Conekta\Model\TokenRequest;
use Conekta\Model\TokenRequestCard;
use Conekta\Model\TokenResponse;

class TokensApiTest extends BaseTestCase
{
    private function api(): TokensApi
    {
        return new TokensApi(null, self::$config);
    }

    public function testCreateToken()
    {
        $request = new TokenRequest([
            'card' => new TokenRequestCard([
                'number' => '5475040095304607',
                'name' => 'John Doe',
                'exp_month' => '06',
                'exp_year' => '24',
                'cvc' => '123',
                'device_fingerprint' => 'fingerprint-test',
            ]),
        ]);

        $response = $this->api()->createToken($request);

        self::assertInstanceOf(TokenResponse::class, $response);
        self::assertNotEmpty($response->getId());
        self::assertSame('token', $response->getObject());
    }
}

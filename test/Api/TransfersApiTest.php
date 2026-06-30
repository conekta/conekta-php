<?php
/**
 * TransfersApiTest
 * PHP version 7.4
 */

namespace Conekta\Test\Api;

use Conekta\Api\TransfersApi;
use Conekta\Model\GetTransfersResponse;
use Conekta\Model\TransferResponse;

class TransfersApiTest extends BaseTestCase
{
    private const TRANSFER_ID = '64462930651b2600017b6d43';

    private function api(): TransfersApi
    {
        return new TransfersApi(null, self::$config);
    }

    public function testGetTransfer()
    {
        $response = $this->api()->getTransfer(self::TRANSFER_ID);

        self::assertInstanceOf(TransferResponse::class, $response);
        self::assertSame(self::TRANSFER_ID, $response->getId());
    }

    public function testGetTransfers()
    {
        // Mockoon's success branch is mapped to limit=5.
        $response = $this->api()->getTransfers('es', null, 5);

        self::assertInstanceOf(GetTransfersResponse::class, $response);
        self::assertNotEmpty($response->getData());
    }
}

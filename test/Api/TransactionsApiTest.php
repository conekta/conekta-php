<?php
/**
 * TransactionsApiTest
 * PHP version 7.4
 */

namespace Conekta\Test\Api;

use Conekta\Api\TransactionsApi;
use Conekta\Model\GetTransactionsResponse;
use Conekta\Model\TransactionResponse;

class TransactionsApiTest extends BaseTestCase
{
    private const TRANSACTION_ID = '6456b6dfac0fd40001a64eb8';

    private function api(): TransactionsApi
    {
        return new TransactionsApi(null, self::$config);
    }

    public function testGetTransaction()
    {
        $response = $this->api()->getTransaction(self::TRANSACTION_ID);

        self::assertInstanceOf(TransactionResponse::class, $response);
        self::assertSame(self::TRANSACTION_ID, $response->getId());
    }

    public function testGetTransactions()
    {
        // Mockoon's success branch is mapped to limit=2.
        $response = $this->api()->getTransactions('es', null, 2);

        self::assertInstanceOf(GetTransactionsResponse::class, $response);
        self::assertNotEmpty($response->getData());
    }
}

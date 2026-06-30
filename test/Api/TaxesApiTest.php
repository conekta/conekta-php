<?php
/**
 * TaxesApiTest
 * PHP version 7.4
 */

namespace Conekta\Test\Api;

use Conekta\Api\TaxesApi;
use Conekta\Model\OrderTaxRequest;
use Conekta\Model\OrderTaxResponse;
use Conekta\Model\OrdersUpdateTaxesRequest;

class TaxesApiTest extends BaseTestCase
{
    private const ORDER_ID = 'ord_2tVyWPnCPWbrV37mW';
    private const TAX_LINE_ID = 'tax_lin_2tVzVp6AAptCRHhgt';

    private function api(): TaxesApi
    {
        return new TaxesApi(null, self::$config);
    }

    public function testOrdersCreateTaxes()
    {
        $request = new OrderTaxRequest([
            'amount' => 600,
            'description' => 'IVA',
        ]);

        $response = $this->api()->ordersCreateTaxes(self::ORDER_ID, $request);

        self::assertInstanceOf(OrderTaxResponse::class, $response);
        self::assertNotEmpty($response->getId());
    }

    public function testOrdersDeleteTaxes()
    {
        $response = $this->api()->ordersDeleteTaxes(self::ORDER_ID, self::TAX_LINE_ID);

        self::assertInstanceOf(OrderTaxResponse::class, $response);
        self::assertSame(self::TAX_LINE_ID, $response->getId());
    }

    public function testOrdersUpdateTaxes()
    {
        $update = new OrdersUpdateTaxesRequest([
            'amount' => 800,
            'description' => 'IVA Updated',
        ]);

        $response = $this->api()->ordersUpdateTaxes(self::ORDER_ID, self::TAX_LINE_ID, $update);

        self::assertInstanceOf(OrderTaxResponse::class, $response);
        self::assertSame(self::TAX_LINE_ID, $response->getId());
    }
}

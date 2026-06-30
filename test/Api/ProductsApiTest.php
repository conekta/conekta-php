<?php
/**
 * ProductsApiTest
 * PHP version 7.4
 */

namespace Conekta\Test\Api;

use Conekta\Api\ProductsApi;
use Conekta\Model\Product;
use Conekta\Model\ProductOrderResponse;
use Conekta\Model\UpdateProduct;

class ProductsApiTest extends BaseTestCase
{
    private const ORDER_ID = 'ord_2tVyWPnCPWbrV37mW';
    private const LINE_ITEM_ID = 'line_item_2tVz8UkyWhSxLfUd7';

    private function api(): ProductsApi
    {
        return new ProductsApi(null, self::$config);
    }

    public function testOrdersCreateProduct()
    {
        $product = new Product([
            'name' => 'Box of Cohiba S1s',
            'unit_price' => 35000,
            'quantity' => 1,
            'sku' => 'cohb_s1',
        ]);

        $response = $this->api()->ordersCreateProduct(self::ORDER_ID, $product);

        self::assertInstanceOf(ProductOrderResponse::class, $response);
        self::assertNotEmpty($response->getId());
    }

    public function testOrdersDeleteProduct()
    {
        $response = $this->api()->ordersDeleteProduct(self::ORDER_ID, self::LINE_ITEM_ID);

        self::assertInstanceOf(ProductOrderResponse::class, $response);
        self::assertSame(self::LINE_ITEM_ID, $response->getId());
    }

    public function testOrdersUpdateProduct()
    {
        $update = new UpdateProduct([
            'name' => 'Box of Cohiba S1s Updated',
            'unit_price' => 40000,
            'quantity' => 2,
        ]);

        $response = $this->api()->ordersUpdateProduct(self::ORDER_ID, self::LINE_ITEM_ID, $update);

        self::assertInstanceOf(ProductOrderResponse::class, $response);
        self::assertSame(self::LINE_ITEM_ID, $response->getId());
    }
}

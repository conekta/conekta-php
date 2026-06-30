<?php
/**
 * CustomersApiTest
 * PHP version 7.4
 */

namespace Conekta\Test\Api;

use Conekta\Api\CustomersApi;
use Conekta\Model\CreateCustomerFiscalEntitiesResponse;
use Conekta\Model\Customer;
use Conekta\Model\CustomerResponse;
use Conekta\Model\CustomersResponse;
use Conekta\Model\FiscalEntityRequest;
use Conekta\Model\FiscalEntityRequestAddress;
use Conekta\Model\UpdateCustomer;
use Conekta\Model\UpdateCustomerFiscalEntitiesResponse;
use Conekta\Model\UpdateFiscalEntityRequest;

class CustomersApiTest extends BaseTestCase
{
    private const CUSTOMER_ID = 'cus_2tXyF9BwPG14UMkkg';
    private const CUSTOMER_GET_ID = 'cus_2tXx8KUxw6311kEbs';
    private const CUSTOMER_UPDATE_ID = 'cus_2tYENskzTjjgkGQLt';
    private const FISCAL_ENTITY_ID = 'fis_ent_2tYENskzTjjgkGQLr';

    private function api(): CustomersApi
    {
        return new CustomersApi(null, self::$config);
    }

    public function testCreateCustomer()
    {
        $customer = new Customer([
            'name' => 'test dotnet',
            'email' => 'test@conekta.com',
            'phone' => '+573143159063',
            'custom_reference' => 'dotnet_12345678',
        ]);

        $response = $this->api()->createCustomer($customer);

        self::assertInstanceOf(CustomerResponse::class, $response);
        self::assertSame('customer', $response->getObject());
        self::assertNotEmpty($response->getId());
    }

    public function testCreateCustomerFiscalEntities()
    {
        $request = new FiscalEntityRequest([
            'tax_id' => 'tax_23432',
            'email' => 'fiscal@conekta.com',
            'phone' => '+5215555555555',
            'address' => new FiscalEntityRequestAddress([
                'street1' => 'av siempre viva',
                'postal_code' => '11011',
                'country' => 'mx',
            ]),
        ]);

        $response = $this->api()->createCustomerFiscalEntities(self::CUSTOMER_ID, $request);

        self::assertInstanceOf(CreateCustomerFiscalEntitiesResponse::class, $response);
        self::assertNotEmpty($response->getId());
    }

    public function testDeleteCustomerById()
    {
        $response = $this->api()->deleteCustomerById(self::CUSTOMER_ID);

        self::assertInstanceOf(CustomerResponse::class, $response);
        self::assertSame(self::CUSTOMER_ID, $response->getId());
    }

    public function testGetCustomerById()
    {
        $response = $this->api()->getCustomerById(self::CUSTOMER_GET_ID);

        self::assertInstanceOf(CustomerResponse::class, $response);
        self::assertSame('customer', $response->getObject());
    }

    public function testGetCustomers()
    {
        $response = $this->api()->getCustomers('es', null, 21);

        self::assertInstanceOf(CustomersResponse::class, $response);
        self::assertSame('list', $response->getObject());
        self::assertNotEmpty($response->getData());
    }

    public function testUpdateCustomer()
    {
        $update = new UpdateCustomer([
            'name' => 'test updated',
            'email' => 'updated@conekta.com',
            'phone' => '+5215555555555',
        ]);

        $response = $this->api()->updateCustomer(self::CUSTOMER_UPDATE_ID, $update);

        self::assertInstanceOf(CustomerResponse::class, $response);
        self::assertSame('customer', $response->getObject());
    }

    public function testUpdateCustomerFiscalEntities()
    {
        $update = new UpdateFiscalEntityRequest([
            'tax_id' => 'tax_23432',
            'email' => 'fiscal_updated@conekta.com',
            'phone' => '+5215555555555',
        ]);

        $response = $this->api()->updateCustomerFiscalEntities(self::CUSTOMER_UPDATE_ID, self::FISCAL_ENTITY_ID, $update);

        self::assertInstanceOf(UpdateCustomerFiscalEntitiesResponse::class, $response);
    }
}

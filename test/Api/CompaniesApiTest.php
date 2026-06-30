<?php
/**
 * CompaniesApiTest
 * PHP version 7.4
 */

namespace Conekta\Test\Api;

use Conekta\Api\CompaniesApi;
use Conekta\ApiException;
use Conekta\Model\CompanyDocumentRequest;
use Conekta\Model\CompanyResponse;
use Conekta\Model\CreateCompanyRequest;
use Conekta\Model\GetCompaniesResponse;

class CompaniesApiTest extends BaseTestCase
{
    private const COMPANY_ID = '6441bb27659a060465da7335';

    private function api(): CompaniesApi
    {
        return new CompaniesApi(null, self::$config);
    }

    public function testCreateCompany()
    {
        $request = new CreateCompanyRequest([
            'name' => 'Acme PHP',
            'type_company' => 'standard',
        ]);

        $this->expectException(ApiException::class);
        $this->api()->createCompany($request);
    }

    public function testGetCompanies()
    {
        $response = $this->api()->getCompanies('es');

        self::assertInstanceOf(GetCompaniesResponse::class, $response);
        self::assertNotEmpty($response->getData());
    }

    public function testGetCompany()
    {
        $response = $this->api()->getCompany(self::COMPANY_ID, 'es');

        self::assertInstanceOf(CompanyResponse::class, $response);
        self::assertSame(self::COMPANY_ID, $response->getId());
    }

    public function testGetCompanyDocuments()
    {
        $this->expectException(ApiException::class);
        $this->api()->getCompanyDocuments(self::COMPANY_ID, 'es');
    }

    public function testGetCurrentCompany()
    {
        // Mockoon resolves /companies/current via the GET /companies/:id default route.
        $response = $this->api()->getCurrentCompany('es');

        self::assertInstanceOf(CompanyResponse::class, $response);
        self::assertNotEmpty($response->getId());
    }

    public function testUpdateCompanyDocument()
    {
        $request = new CompanyDocumentRequest([
            'file_classification' => 'identification',
            'content_type' => 'image/png',
            'international' => false,
            'file_name' => 'doc.png',
            'file_data' => base64_encode('binary'),
        ]);

        $this->expectException(ApiException::class);
        $this->api()->updateCompanyDocument(self::COMPANY_ID, $request);
    }

    public function testUploadCompanyDocument()
    {
        $request = new CompanyDocumentRequest([
            'file_classification' => 'identification',
            'content_type' => 'image/png',
            'international' => false,
            'file_name' => 'doc.png',
            'file_data' => base64_encode('binary'),
        ]);

        $this->expectException(ApiException::class);
        $this->api()->uploadCompanyDocument(self::COMPANY_ID, $request);
    }
}

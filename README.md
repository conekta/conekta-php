# conekta

Conekta sdk

For more information, please visit [https://github.com/conekta/openapi/issues](https://github.com/conekta/openapi/issues).

## Installation & Usage

### Requirements

PHP 7.4 and later.
Should also work with PHP 8.0.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/conekta/conekta-php.git"
    }
  ],
  "require": {
    "conekta/conekta-php": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/conekta/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



// Configure Bearer authorization: bearerAuth
$config = Conekta\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Conekta\Api\AntifraudApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_risk_rules_data = new \Conekta\Model\CreateRiskRulesData(); // \Conekta\Model\CreateRiskRulesData | requested field for blacklist rule
$accept_language = es; // string | Use for knowing which language to use

try {
    $result = $apiInstance->createRuleBlacklist($create_risk_rules_data, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AntifraudApi->createRuleBlacklist: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://api.conekta.io*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*AntifraudApi* | [**createRuleBlacklist**](docs/Api/AntifraudApi.md#createruleblacklist) | **POST** /antifraud/blacklists | Create blacklisted rule
*AntifraudApi* | [**createRuleWhitelist**](docs/Api/AntifraudApi.md#createrulewhitelist) | **POST** /antifraud/whitelists | Create whitelisted rule
*AntifraudApi* | [**deleteRuleBlacklist**](docs/Api/AntifraudApi.md#deleteruleblacklist) | **DELETE** /antifraud/blacklists/{id} | Delete blacklisted rule
*AntifraudApi* | [**deleteRuleWhitelist**](docs/Api/AntifraudApi.md#deleterulewhitelist) | **DELETE** /antifraud/whitelists/{id} | Delete whitelisted rule
*AntifraudApi* | [**getRuleBlacklist**](docs/Api/AntifraudApi.md#getruleblacklist) | **GET** /antifraud/blacklists | Get list of blacklisted rules
*AntifraudApi* | [**getRuleWhitelist**](docs/Api/AntifraudApi.md#getrulewhitelist) | **GET** /antifraud/whitelists | Get a list of whitelisted rules
*ApiKeysApi* | [**createApiKey**](docs/Api/ApiKeysApi.md#createapikey) | **POST** /api_keys | Create Api Key
*ApiKeysApi* | [**deleteApiKey**](docs/Api/ApiKeysApi.md#deleteapikey) | **DELETE** /api_keys/{id} | Delete Api Key
*ApiKeysApi* | [**getApiKey**](docs/Api/ApiKeysApi.md#getapikey) | **GET** /api_keys/{id} | Get Api Key
*ApiKeysApi* | [**getApiKeys**](docs/Api/ApiKeysApi.md#getapikeys) | **GET** /api_keys | Get list of Api Keys
*ApiKeysApi* | [**updateApiKey**](docs/Api/ApiKeysApi.md#updateapikey) | **PUT** /api_keys/{id} | Update Api Key
*BalancesApi* | [**getBalance**](docs/Api/BalancesApi.md#getbalance) | **GET** /balance | Get a company&#39;s balance
*ChargesApi* | [**getCharges**](docs/Api/ChargesApi.md#getcharges) | **GET** /charges | Get A List of Charges
*ChargesApi* | [**ordersCreateCharge**](docs/Api/ChargesApi.md#orderscreatecharge) | **POST** /orders/{id}/charges | Create charge
*ChargesApi* | [**ordersCreateCharges**](docs/Api/ChargesApi.md#orderscreatecharges) | **POST** /orders/{id}/add_charges | Create charges
*ChargesApi* | [**updateCharge**](docs/Api/ChargesApi.md#updatecharge) | **PUT** /charges/{id} | Update a charge
*CompaniesApi* | [**getCompanies**](docs/Api/CompaniesApi.md#getcompanies) | **GET** /companies | Get List of Companies
*CompaniesApi* | [**getCompany**](docs/Api/CompaniesApi.md#getcompany) | **GET** /companies/{id} | Get Company
*CustomersApi* | [**createCustomer**](docs/Api/CustomersApi.md#createcustomer) | **POST** /customers | Create customer
*CustomersApi* | [**createCustomerFiscalEntities**](docs/Api/CustomersApi.md#createcustomerfiscalentities) | **POST** /customers/{id}/fiscal_entities | Create Fiscal Entity
*CustomersApi* | [**deleteCustomerById**](docs/Api/CustomersApi.md#deletecustomerbyid) | **DELETE** /customers/{id} | Delete Customer
*CustomersApi* | [**getCustomerById**](docs/Api/CustomersApi.md#getcustomerbyid) | **GET** /customers/{id} | Get Customer
*CustomersApi* | [**getCustomers**](docs/Api/CustomersApi.md#getcustomers) | **GET** /customers | Get a list of customers
*CustomersApi* | [**updateCustomer**](docs/Api/CustomersApi.md#updatecustomer) | **PUT** /customers/{id} | Update customer
*CustomersApi* | [**updateCustomerFiscalEntities**](docs/Api/CustomersApi.md#updatecustomerfiscalentities) | **PUT** /customers/{id}/fiscal_entities/{fiscal_entities_id} | Update  Fiscal Entity
*DiscountsApi* | [**ordersCreateDiscountLine**](docs/Api/DiscountsApi.md#orderscreatediscountline) | **POST** /orders/{id}/discount_lines | Create Discount
*DiscountsApi* | [**ordersDeleteDiscountLines**](docs/Api/DiscountsApi.md#ordersdeletediscountlines) | **DELETE** /orders/{id}/discount_lines/{discount_lines_id} | Delete Discount
*DiscountsApi* | [**ordersGetDiscountLine**](docs/Api/DiscountsApi.md#ordersgetdiscountline) | **GET** /orders/{id}/discount_lines/{discount_lines_id} | Get Discount
*DiscountsApi* | [**ordersGetDiscountLines**](docs/Api/DiscountsApi.md#ordersgetdiscountlines) | **GET** /orders/{id}/discount_lines | Get a List of Discount
*DiscountsApi* | [**ordersUpdateDiscountLines**](docs/Api/DiscountsApi.md#ordersupdatediscountlines) | **PUT** /orders/{id}/discount_lines/{discount_lines_id} | Update Discount
*EventsApi* | [**getEvent**](docs/Api/EventsApi.md#getevent) | **GET** /events/{id} | Get Event
*EventsApi* | [**getEvents**](docs/Api/EventsApi.md#getevents) | **GET** /events | Get list of Events
*EventsApi* | [**resendEvent**](docs/Api/EventsApi.md#resendevent) | **POST** /events/{event_id}/resend | Resend Event
*LogsApi* | [**getLogById**](docs/Api/LogsApi.md#getlogbyid) | **GET** /logs/{id} | Get Log
*LogsApi* | [**getLogs**](docs/Api/LogsApi.md#getlogs) | **GET** /logs | Get List Of Logs
*OrdersApi* | [**cancelOrder**](docs/Api/OrdersApi.md#cancelorder) | **POST** /orders/{id}/cancel | Cancel Order
*OrdersApi* | [**createOrder**](docs/Api/OrdersApi.md#createorder) | **POST** /orders | Create order
*OrdersApi* | [**getOrderById**](docs/Api/OrdersApi.md#getorderbyid) | **GET** /orders/{id} | Get Order
*OrdersApi* | [**getOrders**](docs/Api/OrdersApi.md#getorders) | **GET** /orders | Get a list of Orders
*OrdersApi* | [**orderCancelRefund**](docs/Api/OrdersApi.md#ordercancelrefund) | **DELETE** /orders/{id}/refunds/{refund_id} | Cancel Refund
*OrdersApi* | [**orderRefund**](docs/Api/OrdersApi.md#orderrefund) | **POST** /orders/{id}/refunds | Refund Order
*OrdersApi* | [**ordersCreateCapture**](docs/Api/OrdersApi.md#orderscreatecapture) | **POST** /orders/{id}/capture | Capture Order
*OrdersApi* | [**updateOrder**](docs/Api/OrdersApi.md#updateorder) | **PUT** /orders/{id} | Update Order
*PaymentLinkApi* | [**cancelCheckout**](docs/Api/PaymentLinkApi.md#cancelcheckout) | **PUT** /checkouts/{id}/cancel | Cancel Payment Link
*PaymentLinkApi* | [**createCheckout**](docs/Api/PaymentLinkApi.md#createcheckout) | **POST** /checkouts | Create Unique Payment Link
*PaymentLinkApi* | [**emailCheckout**](docs/Api/PaymentLinkApi.md#emailcheckout) | **POST** /checkouts/{id}/email | Send an email
*PaymentLinkApi* | [**getCheckout**](docs/Api/PaymentLinkApi.md#getcheckout) | **GET** /checkouts/{id} | Get a payment link by ID
*PaymentLinkApi* | [**getCheckouts**](docs/Api/PaymentLinkApi.md#getcheckouts) | **GET** /checkouts | Get a list of payment links
*PaymentLinkApi* | [**smsCheckout**](docs/Api/PaymentLinkApi.md#smscheckout) | **POST** /checkouts/{id}/sms | Send an sms
*PaymentMethodsApi* | [**createCustomerPaymentMethods**](docs/Api/PaymentMethodsApi.md#createcustomerpaymentmethods) | **POST** /customers/{id}/payment_sources | Create Payment Method
*PaymentMethodsApi* | [**deleteCustomerPaymentMethods**](docs/Api/PaymentMethodsApi.md#deletecustomerpaymentmethods) | **DELETE** /customers/{id}/payment_sources/{payment_method_id} | Delete Payment Method
*PaymentMethodsApi* | [**getCustomerPaymentMethods**](docs/Api/PaymentMethodsApi.md#getcustomerpaymentmethods) | **GET** /customers/{id}/payment_sources | Get Payment Methods
*PaymentMethodsApi* | [**updateCustomerPaymentMethods**](docs/Api/PaymentMethodsApi.md#updatecustomerpaymentmethods) | **PUT** /customers/{id}/payment_sources/{payment_method_id} | Update Payment Method
*PayoutOrdersApi* | [**cancelPayoutOrderById**](docs/Api/PayoutOrdersApi.md#cancelpayoutorderbyid) | **PUT** /payout_orders/{id}/cancel | Cancel Payout Order
*PayoutOrdersApi* | [**createPayoutOrder**](docs/Api/PayoutOrdersApi.md#createpayoutorder) | **POST** /payout_orders | Create payout order
*PayoutOrdersApi* | [**getPayoutOrderById**](docs/Api/PayoutOrdersApi.md#getpayoutorderbyid) | **GET** /payout_orders/{id} | Get Payout Order
*PayoutOrdersApi* | [**getPayoutOrders**](docs/Api/PayoutOrdersApi.md#getpayoutorders) | **GET** /payout_orders | Get a list of Payout Orders
*PlansApi* | [**createPlan**](docs/Api/PlansApi.md#createplan) | **POST** /plans | Create Plan
*PlansApi* | [**deletePlan**](docs/Api/PlansApi.md#deleteplan) | **DELETE** /plans/{id} | Delete Plan
*PlansApi* | [**getPlan**](docs/Api/PlansApi.md#getplan) | **GET** /plans/{id} | Get Plan
*PlansApi* | [**getPlans**](docs/Api/PlansApi.md#getplans) | **GET** /plans | Get A List of Plans
*PlansApi* | [**updatePlan**](docs/Api/PlansApi.md#updateplan) | **PUT** /plans/{id} | Update Plan
*ProductsApi* | [**ordersCreateProduct**](docs/Api/ProductsApi.md#orderscreateproduct) | **POST** /orders/{id}/line_items | Create Product
*ProductsApi* | [**ordersDeleteProduct**](docs/Api/ProductsApi.md#ordersdeleteproduct) | **DELETE** /orders/{id}/line_items/{line_item_id} | Delete Product
*ProductsApi* | [**ordersUpdateProduct**](docs/Api/ProductsApi.md#ordersupdateproduct) | **PUT** /orders/{id}/line_items/{line_item_id} | Update Product
*ShippingContactsApi* | [**createCustomerShippingContacts**](docs/Api/ShippingContactsApi.md#createcustomershippingcontacts) | **POST** /customers/{id}/shipping_contacts | Create a shipping contacts
*ShippingContactsApi* | [**deleteCustomerShippingContacts**](docs/Api/ShippingContactsApi.md#deletecustomershippingcontacts) | **DELETE** /customers/{id}/shipping_contacts/{shipping_contacts_id} | Delete shipping contacts
*ShippingContactsApi* | [**updateCustomerShippingContacts**](docs/Api/ShippingContactsApi.md#updatecustomershippingcontacts) | **PUT** /customers/{id}/shipping_contacts/{shipping_contacts_id} | Update shipping contacts
*ShippingsApi* | [**ordersCreateShipping**](docs/Api/ShippingsApi.md#orderscreateshipping) | **POST** /orders/{id}/shipping_lines | Create Shipping
*ShippingsApi* | [**ordersDeleteShipping**](docs/Api/ShippingsApi.md#ordersdeleteshipping) | **DELETE** /orders/{id}/shipping_lines/{shipping_id} | Delete Shipping
*ShippingsApi* | [**ordersUpdateShipping**](docs/Api/ShippingsApi.md#ordersupdateshipping) | **PUT** /orders/{id}/shipping_lines/{shipping_id} | Update Shipping
*SubscriptionsApi* | [**cancelSubscription**](docs/Api/SubscriptionsApi.md#cancelsubscription) | **POST** /customers/{id}/subscription/cancel | Cancel Subscription [Deprecated]
*SubscriptionsApi* | [**createSubscription**](docs/Api/SubscriptionsApi.md#createsubscription) | **POST** /customers/{id}/subscription | Create Subscription [Deprecated]
*SubscriptionsApi* | [**getSubscription**](docs/Api/SubscriptionsApi.md#getsubscription) | **GET** /customers/{id}/subscription | Get Subscription [Deprecated]
*SubscriptionsApi* | [**getSubscriptionEvents**](docs/Api/SubscriptionsApi.md#getsubscriptionevents) | **GET** /customers/{id}/subscription/events | Get Subscription Events [Deprecated]
*SubscriptionsApi* | [**pauseSubscription**](docs/Api/SubscriptionsApi.md#pausesubscription) | **POST** /customers/{id}/subscription/pause | Pause Subscription [Deprecated]
*SubscriptionsApi* | [**resumeSubscription**](docs/Api/SubscriptionsApi.md#resumesubscription) | **POST** /customers/{id}/subscription/resume | Resume Subscription [Deprecated]
*SubscriptionsApi* | [**subscriptionCancel**](docs/Api/SubscriptionsApi.md#subscriptioncancel) | **POST** /customers/{customer_id}/subscriptions/{id}/cancel | Cancel Subscription
*SubscriptionsApi* | [**subscriptionCreate**](docs/Api/SubscriptionsApi.md#subscriptioncreate) | **POST** /customers/{customer_id}/subscriptions | Create Subscription
*SubscriptionsApi* | [**subscriptionEvents**](docs/Api/SubscriptionsApi.md#subscriptionevents) | **GET** /customers/{customer_id}/subscriptions/{id}/events | Get Subscription Events
*SubscriptionsApi* | [**subscriptionList**](docs/Api/SubscriptionsApi.md#subscriptionlist) | **GET** /customers/{customer_id}/subscriptions | List Subscriptions
*SubscriptionsApi* | [**subscriptionPause**](docs/Api/SubscriptionsApi.md#subscriptionpause) | **POST** /customers/{customer_id}/subscriptions/{id}/pause | Pause Subscription
*SubscriptionsApi* | [**subscriptionResume**](docs/Api/SubscriptionsApi.md#subscriptionresume) | **POST** /customers/{customer_id}/subscriptions/{id}/resume | Resume Subscription
*SubscriptionsApi* | [**subscriptionUpdate**](docs/Api/SubscriptionsApi.md#subscriptionupdate) | **PUT** /customers/{customer_id}/subscriptions/{id} | Update Subscription
*SubscriptionsApi* | [**subscriptionsGet**](docs/Api/SubscriptionsApi.md#subscriptionsget) | **GET** /customers/{customer_id}/subscriptions/{id} | Get Subscription
*SubscriptionsApi* | [**subscriptionsRetry**](docs/Api/SubscriptionsApi.md#subscriptionsretry) | **POST** /customers/{customer_id}/subscriptions/{id}/retry | Retry Failed Payment
*SubscriptionsApi* | [**updateSubscription**](docs/Api/SubscriptionsApi.md#updatesubscription) | **PUT** /customers/{id}/subscription | Update Subscription [Deprecated]
*TaxesApi* | [**ordersCreateTaxes**](docs/Api/TaxesApi.md#orderscreatetaxes) | **POST** /orders/{id}/tax_lines | Create Tax
*TaxesApi* | [**ordersDeleteTaxes**](docs/Api/TaxesApi.md#ordersdeletetaxes) | **DELETE** /orders/{id}/tax_lines/{tax_id} | Delete Tax
*TaxesApi* | [**ordersUpdateTaxes**](docs/Api/TaxesApi.md#ordersupdatetaxes) | **PUT** /orders/{id}/tax_lines/{tax_id} | Update Tax
*TokensApi* | [**createToken**](docs/Api/TokensApi.md#createtoken) | **POST** /tokens | Create Token
*TransactionsApi* | [**getTransaction**](docs/Api/TransactionsApi.md#gettransaction) | **GET** /transactions/{id} | Get transaction
*TransactionsApi* | [**getTransactions**](docs/Api/TransactionsApi.md#gettransactions) | **GET** /transactions | Get List transactions
*TransfersApi* | [**getTransfer**](docs/Api/TransfersApi.md#gettransfer) | **GET** /transfers/{id} | Get Transfer
*TransfersApi* | [**getTransfers**](docs/Api/TransfersApi.md#gettransfers) | **GET** /transfers | Get a list of transfers
*WebhookKeysApi* | [**createWebhookKey**](docs/Api/WebhookKeysApi.md#createwebhookkey) | **POST** /webhook_keys | Create Webhook Key
*WebhookKeysApi* | [**deleteWebhookKey**](docs/Api/WebhookKeysApi.md#deletewebhookkey) | **DELETE** /webhook_keys/{id} | Delete Webhook key
*WebhookKeysApi* | [**getWebhookKey**](docs/Api/WebhookKeysApi.md#getwebhookkey) | **GET** /webhook_keys/{id} | Get Webhook Key
*WebhookKeysApi* | [**getWebhookKeys**](docs/Api/WebhookKeysApi.md#getwebhookkeys) | **GET** /webhook_keys | Get List of Webhook Keys
*WebhookKeysApi* | [**updateWebhookKey**](docs/Api/WebhookKeysApi.md#updatewebhookkey) | **PUT** /webhook_keys/{id} | Update Webhook Key
*WebhooksApi* | [**createWebhook**](docs/Api/WebhooksApi.md#createwebhook) | **POST** /webhooks | Create Webhook
*WebhooksApi* | [**deleteWebhook**](docs/Api/WebhooksApi.md#deletewebhook) | **DELETE** /webhooks/{id} | Delete Webhook
*WebhooksApi* | [**getWebhook**](docs/Api/WebhooksApi.md#getwebhook) | **GET** /webhooks/{id} | Get Webhook
*WebhooksApi* | [**getWebhooks**](docs/Api/WebhooksApi.md#getwebhooks) | **GET** /webhooks | Get List of Webhooks
*WebhooksApi* | [**testWebhook**](docs/Api/WebhooksApi.md#testwebhook) | **POST** /webhooks/{id}/test | Test Webhook
*WebhooksApi* | [**updateWebhook**](docs/Api/WebhooksApi.md#updatewebhook) | **PUT** /webhooks/{id} | Update Webhook

## Models

- [ApiKeyCreateResponse](docs/Model/ApiKeyCreateResponse.md)
- [ApiKeyRequest](docs/Model/ApiKeyRequest.md)
- [ApiKeyResponse](docs/Model/ApiKeyResponse.md)
- [ApiKeyResponseOnDelete](docs/Model/ApiKeyResponseOnDelete.md)
- [ApiKeyUpdateRequest](docs/Model/ApiKeyUpdateRequest.md)
- [BalanceCommonField](docs/Model/BalanceCommonField.md)
- [BalanceResponse](docs/Model/BalanceResponse.md)
- [BlacklistRuleResponse](docs/Model/BlacklistRuleResponse.md)
- [ChargeOrderResponse](docs/Model/ChargeOrderResponse.md)
- [ChargeOrderResponsePaymentMethod](docs/Model/ChargeOrderResponsePaymentMethod.md)
- [ChargeRequest](docs/Model/ChargeRequest.md)
- [ChargeRequestPaymentMethod](docs/Model/ChargeRequestPaymentMethod.md)
- [ChargeResponse](docs/Model/ChargeResponse.md)
- [ChargeResponseChannel](docs/Model/ChargeResponseChannel.md)
- [ChargeResponsePaymentMethod](docs/Model/ChargeResponsePaymentMethod.md)
- [ChargeResponseRefunds](docs/Model/ChargeResponseRefunds.md)
- [ChargeResponseRefundsData](docs/Model/ChargeResponseRefundsData.md)
- [ChargeUpdateRequest](docs/Model/ChargeUpdateRequest.md)
- [ChargesDataResponse](docs/Model/ChargesDataResponse.md)
- [ChargesOrderResponse](docs/Model/ChargesOrderResponse.md)
- [ChargesOrderResponseAllOfData](docs/Model/ChargesOrderResponseAllOfData.md)
- [Checkout](docs/Model/Checkout.md)
- [CheckoutOrderTemplate](docs/Model/CheckoutOrderTemplate.md)
- [CheckoutOrderTemplateCustomerInfo](docs/Model/CheckoutOrderTemplateCustomerInfo.md)
- [CheckoutRequest](docs/Model/CheckoutRequest.md)
- [CheckoutResponse](docs/Model/CheckoutResponse.md)
- [CheckoutsResponse](docs/Model/CheckoutsResponse.md)
- [CompanyFiscalInfoAddressResponse](docs/Model/CompanyFiscalInfoAddressResponse.md)
- [CompanyFiscalInfoResponse](docs/Model/CompanyFiscalInfoResponse.md)
- [CompanyPayoutDestinationResponse](docs/Model/CompanyPayoutDestinationResponse.md)
- [CompanyResponse](docs/Model/CompanyResponse.md)
- [CreateCustomerFiscalEntitiesResponse](docs/Model/CreateCustomerFiscalEntitiesResponse.md)
- [CreateCustomerPaymentMethodsRequest](docs/Model/CreateCustomerPaymentMethodsRequest.md)
- [CreateCustomerPaymentMethodsResponse](docs/Model/CreateCustomerPaymentMethodsResponse.md)
- [CreateRiskRulesData](docs/Model/CreateRiskRulesData.md)
- [Customer](docs/Model/Customer.md)
- [CustomerAddress](docs/Model/CustomerAddress.md)
- [CustomerAntifraudInfo](docs/Model/CustomerAntifraudInfo.md)
- [CustomerAntifraudInfoResponse](docs/Model/CustomerAntifraudInfoResponse.md)
- [CustomerFiscalEntitiesDataResponse](docs/Model/CustomerFiscalEntitiesDataResponse.md)
- [CustomerFiscalEntitiesRequest](docs/Model/CustomerFiscalEntitiesRequest.md)
- [CustomerFiscalEntitiesResponse](docs/Model/CustomerFiscalEntitiesResponse.md)
- [CustomerInfo](docs/Model/CustomerInfo.md)
- [CustomerInfoJustCustomerId](docs/Model/CustomerInfoJustCustomerId.md)
- [CustomerInfoJustCustomerIdResponse](docs/Model/CustomerInfoJustCustomerIdResponse.md)
- [CustomerPaymentMethodRequest](docs/Model/CustomerPaymentMethodRequest.md)
- [CustomerPaymentMethodsData](docs/Model/CustomerPaymentMethodsData.md)
- [CustomerPaymentMethodsRequest](docs/Model/CustomerPaymentMethodsRequest.md)
- [CustomerPaymentMethodsResponse](docs/Model/CustomerPaymentMethodsResponse.md)
- [CustomerResponse](docs/Model/CustomerResponse.md)
- [CustomerResponseShippingContacts](docs/Model/CustomerResponseShippingContacts.md)
- [CustomerShippingContacts](docs/Model/CustomerShippingContacts.md)
- [CustomerShippingContactsAddress](docs/Model/CustomerShippingContactsAddress.md)
- [CustomerShippingContactsDataResponse](docs/Model/CustomerShippingContactsDataResponse.md)
- [CustomerShippingContactsResponse](docs/Model/CustomerShippingContactsResponse.md)
- [CustomerShippingContactsResponseAddress](docs/Model/CustomerShippingContactsResponseAddress.md)
- [CustomerUpdateFiscalEntitiesRequest](docs/Model/CustomerUpdateFiscalEntitiesRequest.md)
- [CustomerUpdateShippingContacts](docs/Model/CustomerUpdateShippingContacts.md)
- [CustomersResponse](docs/Model/CustomersResponse.md)
- [DeleteApiKeysResponse](docs/Model/DeleteApiKeysResponse.md)
- [DeletedBlacklistRuleResponse](docs/Model/DeletedBlacklistRuleResponse.md)
- [DeletedWhitelistRuleResponse](docs/Model/DeletedWhitelistRuleResponse.md)
- [Details](docs/Model/Details.md)
- [DetailsError](docs/Model/DetailsError.md)
- [DiscountLinesDataResponse](docs/Model/DiscountLinesDataResponse.md)
- [DiscountLinesResponse](docs/Model/DiscountLinesResponse.md)
- [EmailCheckoutRequest](docs/Model/EmailCheckoutRequest.md)
- [Error](docs/Model/Error.md)
- [EventResponse](docs/Model/EventResponse.md)
- [EventTypes](docs/Model/EventTypes.md)
- [EventsResendResponse](docs/Model/EventsResendResponse.md)
- [FiscalEntityAddress](docs/Model/FiscalEntityAddress.md)
- [GetApiKeysResponse](docs/Model/GetApiKeysResponse.md)
- [GetChargesResponse](docs/Model/GetChargesResponse.md)
- [GetCompaniesResponse](docs/Model/GetCompaniesResponse.md)
- [GetCustomerPaymentMethodDataResponse](docs/Model/GetCustomerPaymentMethodDataResponse.md)
- [GetEventsResponse](docs/Model/GetEventsResponse.md)
- [GetOrderDiscountLinesResponse](docs/Model/GetOrderDiscountLinesResponse.md)
- [GetOrdersResponse](docs/Model/GetOrdersResponse.md)
- [GetPaymentMethodResponse](docs/Model/GetPaymentMethodResponse.md)
- [GetPlansResponse](docs/Model/GetPlansResponse.md)
- [GetTransactionsResponse](docs/Model/GetTransactionsResponse.md)
- [GetTransfersResponse](docs/Model/GetTransfersResponse.md)
- [GetWebhookKeysResponse](docs/Model/GetWebhookKeysResponse.md)
- [GetWebhooksResponse](docs/Model/GetWebhooksResponse.md)
- [LogResponse](docs/Model/LogResponse.md)
- [LogsResponse](docs/Model/LogsResponse.md)
- [LogsResponseData](docs/Model/LogsResponseData.md)
- [OrderCaptureRequest](docs/Model/OrderCaptureRequest.md)
- [OrderChannelResponse](docs/Model/OrderChannelResponse.md)
- [OrderChargesResponse](docs/Model/OrderChargesResponse.md)
- [OrderCustomerInfoResponse](docs/Model/OrderCustomerInfoResponse.md)
- [OrderDiscountLinesRequest](docs/Model/OrderDiscountLinesRequest.md)
- [OrderDiscountLinesResponse](docs/Model/OrderDiscountLinesResponse.md)
- [OrderFiscalEntityAddressResponse](docs/Model/OrderFiscalEntityAddressResponse.md)
- [OrderFiscalEntityRequest](docs/Model/OrderFiscalEntityRequest.md)
- [OrderFiscalEntityResponse](docs/Model/OrderFiscalEntityResponse.md)
- [OrderNextActionResponse](docs/Model/OrderNextActionResponse.md)
- [OrderNextActionResponseRedirectToUrl](docs/Model/OrderNextActionResponseRedirectToUrl.md)
- [OrderRefundRequest](docs/Model/OrderRefundRequest.md)
- [OrderRequest](docs/Model/OrderRequest.md)
- [OrderRequestCustomerInfo](docs/Model/OrderRequestCustomerInfo.md)
- [OrderResponse](docs/Model/OrderResponse.md)
- [OrderResponseCheckout](docs/Model/OrderResponseCheckout.md)
- [OrderResponseCustomerInfo](docs/Model/OrderResponseCustomerInfo.md)
- [OrderResponseProducts](docs/Model/OrderResponseProducts.md)
- [OrderResponseShippingContact](docs/Model/OrderResponseShippingContact.md)
- [OrderTaxRequest](docs/Model/OrderTaxRequest.md)
- [OrderUpdateFiscalEntityRequest](docs/Model/OrderUpdateFiscalEntityRequest.md)
- [OrderUpdateRequest](docs/Model/OrderUpdateRequest.md)
- [OrderUpdateRequestCustomerInfo](docs/Model/OrderUpdateRequestCustomerInfo.md)
- [OrdersResponse](docs/Model/OrdersResponse.md)
- [Page](docs/Model/Page.md)
- [Pagination](docs/Model/Pagination.md)
- [PaymentMethod](docs/Model/PaymentMethod.md)
- [PaymentMethodBankTransfer](docs/Model/PaymentMethodBankTransfer.md)
- [PaymentMethodBnplPayment](docs/Model/PaymentMethodBnplPayment.md)
- [PaymentMethodBnplRequest](docs/Model/PaymentMethodBnplRequest.md)
- [PaymentMethodCard](docs/Model/PaymentMethodCard.md)
- [PaymentMethodCardRequest](docs/Model/PaymentMethodCardRequest.md)
- [PaymentMethodCardResponse](docs/Model/PaymentMethodCardResponse.md)
- [PaymentMethodCash](docs/Model/PaymentMethodCash.md)
- [PaymentMethodCashRequest](docs/Model/PaymentMethodCashRequest.md)
- [PaymentMethodCashResponse](docs/Model/PaymentMethodCashResponse.md)
- [PaymentMethodCashResponseAllOfAgreements](docs/Model/PaymentMethodCashResponseAllOfAgreements.md)
- [PaymentMethodGeneralRequest](docs/Model/PaymentMethodGeneralRequest.md)
- [PaymentMethodResponse](docs/Model/PaymentMethodResponse.md)
- [PaymentMethodSpeiRecurrent](docs/Model/PaymentMethodSpeiRecurrent.md)
- [PaymentMethodSpeiRequest](docs/Model/PaymentMethodSpeiRequest.md)
- [PaymentMethodTokenRequest](docs/Model/PaymentMethodTokenRequest.md)
- [Payout](docs/Model/Payout.md)
- [PayoutMethod](docs/Model/PayoutMethod.md)
- [PayoutOrder](docs/Model/PayoutOrder.md)
- [PayoutOrderPayoutsItem](docs/Model/PayoutOrderPayoutsItem.md)
- [PayoutOrderResponse](docs/Model/PayoutOrderResponse.md)
- [PayoutOrderResponseCustomerInfo](docs/Model/PayoutOrderResponseCustomerInfo.md)
- [PayoutOrdersResponse](docs/Model/PayoutOrdersResponse.md)
- [PlanRequest](docs/Model/PlanRequest.md)
- [PlanResponse](docs/Model/PlanResponse.md)
- [PlanUpdateRequest](docs/Model/PlanUpdateRequest.md)
- [Product](docs/Model/Product.md)
- [ProductDataResponse](docs/Model/ProductDataResponse.md)
- [ProductOrderResponse](docs/Model/ProductOrderResponse.md)
- [ResendRequest](docs/Model/ResendRequest.md)
- [RiskRulesData](docs/Model/RiskRulesData.md)
- [RiskRulesList](docs/Model/RiskRulesList.md)
- [ShippingOrderResponse](docs/Model/ShippingOrderResponse.md)
- [ShippingRequest](docs/Model/ShippingRequest.md)
- [SmsCheckoutRequest](docs/Model/SmsCheckoutRequest.md)
- [SubscriptionEventsResponse](docs/Model/SubscriptionEventsResponse.md)
- [SubscriptionRequest](docs/Model/SubscriptionRequest.md)
- [SubscriptionResponse](docs/Model/SubscriptionResponse.md)
- [SubscriptionUpdateRequest](docs/Model/SubscriptionUpdateRequest.md)
- [Token](docs/Model/Token.md)
- [TokenCard](docs/Model/TokenCard.md)
- [TokenCheckout](docs/Model/TokenCheckout.md)
- [TokenResponse](docs/Model/TokenResponse.md)
- [TokenResponseCheckout](docs/Model/TokenResponseCheckout.md)
- [TransactionResponse](docs/Model/TransactionResponse.md)
- [TransferDestinationResponse](docs/Model/TransferDestinationResponse.md)
- [TransferMethodResponse](docs/Model/TransferMethodResponse.md)
- [TransferResponse](docs/Model/TransferResponse.md)
- [TransfersResponse](docs/Model/TransfersResponse.md)
- [UpdateCustomer](docs/Model/UpdateCustomer.md)
- [UpdateCustomerAntifraudInfo](docs/Model/UpdateCustomerAntifraudInfo.md)
- [UpdateCustomerFiscalEntitiesResponse](docs/Model/UpdateCustomerFiscalEntitiesResponse.md)
- [UpdateCustomerPaymentMethodsResponse](docs/Model/UpdateCustomerPaymentMethodsResponse.md)
- [UpdateOrderDiscountLinesRequest](docs/Model/UpdateOrderDiscountLinesRequest.md)
- [UpdateOrderTaxRequest](docs/Model/UpdateOrderTaxRequest.md)
- [UpdateOrderTaxResponse](docs/Model/UpdateOrderTaxResponse.md)
- [UpdatePaymentMethods](docs/Model/UpdatePaymentMethods.md)
- [UpdateProduct](docs/Model/UpdateProduct.md)
- [WebhookKeyCreateResponse](docs/Model/WebhookKeyCreateResponse.md)
- [WebhookKeyDeleteResponse](docs/Model/WebhookKeyDeleteResponse.md)
- [WebhookKeyRequest](docs/Model/WebhookKeyRequest.md)
- [WebhookKeyResponse](docs/Model/WebhookKeyResponse.md)
- [WebhookKeyUpdateRequest](docs/Model/WebhookKeyUpdateRequest.md)
- [WebhookLog](docs/Model/WebhookLog.md)
- [WebhookRequest](docs/Model/WebhookRequest.md)
- [WebhookResponse](docs/Model/WebhookResponse.md)
- [WebhookUpdateRequest](docs/Model/WebhookUpdateRequest.md)
- [WhitelistlistRuleResponse](docs/Model/WhitelistlistRuleResponse.md)

## Authorization

Authentication schemes defined for the API:
### bearerAuth

- **Type**: Bearer authentication

## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author

engineering@conekta.com

## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `2.2.0`
    - Package version: `7.0.1`
    - Generator version: `7.9.0`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`

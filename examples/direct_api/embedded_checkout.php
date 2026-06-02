<?php
/**
 * Ejemplo: Checkout Embebido (Integration)
 *
 * A diferencia del HostedPayment (que redirige al cliente a una página alojada
 * por Conekta), el checkout de tipo "Integration" permite incrustar el formulario
 * de pago directamente en tu sitio usando el SDK de JavaScript de Conekta.
 *
 * El flujo es:
 *   1. Creas la orden con un checkout de tipo 'Integration'.
 *   2. Obtienes el `id` del checkout desde la respuesta.
 *   3. Usas ese `id` para renderizar el formulario embebido en tu frontend.
 */
require __DIR__ . '/../../vendor/autoload.php';

use Conekta\Api\OrdersApi;
use Conekta\ApiException;
use Conekta\Configuration;
use Conekta\Model\OrderRequest;

$apiKey = getenv("CONEKTA_API_KEY");
$config = Configuration::getDefaultConfiguration()->setAccessToken($apiKey);

$apiInstance = new OrdersApi(null, $config);
$accept_language = 'es';

$rq = new OrderRequest([
    'currency' => 'MXN',
    'customer_info' => [
        'name' => 'Fran Carrero',
        'email' => 'fran@example.com',
        'phone' => '+5218181818181'
    ],
    'line_items' => [
        [
            'name' => 'Box of Cohiba S1s',
            'unit_price' => 35000,
            'quantity' => 1
        ]
    ],
    'checkout' => [
        'allowed_payment_methods' => [
            'card',
            'cash',
            'bank_transfer',
            'bnpl',
            'pay_by_bank'
        ],
        // 'Integration' habilita el checkout embebido en tu propio sitio.
        'type' => 'Integration',
        'monthly_installments_enabled' => true,
        'monthly_installments_options' => [3, 6, 12],
        // Tiempo de expiracion del checkout (segundos desde el epoch Unix).
        'expires_at' => time() + (60 * 60 * 24) // 24 horas
    ]
]);

try {
    $result = $apiInstance->createOrder($rq, $accept_language);
    $json_string = json_encode($result, JSON_PRETTY_PRINT);
    print_r($json_string);

    // El id del checkout es el que se usa para renderizar el formulario embebido.
    $checkoutId = $result->getCheckout()->getId();
    echo PHP_EOL . "Checkout ID (usalo en el frontend): " . $checkoutId . PHP_EOL;

    /*
     * En tu frontend, incrusta el checkout usando el SDK de JavaScript de Conekta:
     *
     * <div id="conekta-checkout" style="width:500px;height:600px;"></div>
     * <script src="https://pay.conekta.com/v1.0/js/conekta-checkout.min.js"></script>
     * <script>
     *   window.ConektaCheckoutComponents.Integration({
     *     targetIFrame: '#conekta-checkout',
     *     checkoutRequestId: '<?php echo $checkoutId; ?>', // id devuelto por la API
     *     publicKey: 'TU_LLAVE_PUBLICA',
     *     options: {
     *       theme: 'default',
     *       styles: { inputType: 'rounded', buttonType: 'rounded' },
     *       paymentMethods: ['Card', 'Cash', 'BankTransfer']
     *     },
     *     onCreateTokenSucceeded: function (token) { console.log(token); },
     *     onCreateTokenError: function (error) { console.log(error); },
     *     onFinalizePayment: function (order) { console.log(order); }
     *   });
     * </script>
     */
} catch (ApiException $e) {
    echo 'Exception when calling OrdersApi->createOrder: ', $e->getMessage(), PHP_EOL;
}

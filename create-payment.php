<?php

require 'vendor/autoload.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

// Set up PayPal API context
$apiContext = new ApiContext(
    new OAuthTokenCredential(
        $_ENV['PAYPAL_CLIENT_ID'],
        $_ENV['PAYPAL_SECRET']
    )
);

$apiContext->setConfig([
    'mode' => $_ENV['PAYPAL_MODE'], // Use 'live' or 'sandbox'
]);

// Handle the payment creation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amountToAdd = $_POST['amount']; // Amount from the frontend

    $payer = new Payer();
    $payer->setPaymentMethod('paypal');

    $amount = new Amount();
    $amount->setTotal($amountToAdd);
    $amount->setCurrency('USD'); // Set your currency

    $transaction = new Transaction();
    $transaction->setAmount($amount);
    $transaction->setDescription('Add money to your account');

    $redirectUrls = new RedirectUrls();
    $redirectUrls->setReturnUrl('http://localhost/success.php') // Replace with your success URL
                 ->setCancelUrl('http://localhost/cancel.php'); // Replace with your cancel URL

    $payment = new Payment();
    $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions([$transaction])
            ->setRedirectUrls($redirectUrls);

    try {
        $payment->create($apiContext);

        // Redirect the user to the PayPal approval URL
        header('Location: ' . $payment->getApprovalLink());
        exit;
    } catch (Exception $ex) {
        echo 'Error: ' . $ex->getMessage();
        exit;
    }
}
?>

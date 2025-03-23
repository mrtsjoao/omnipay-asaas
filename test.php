<?php

require 'vendor/autoload.php';

use Omnipay\Asaas\AsaasGateway;

// Criar uma instância do gateway
$gateway = new AsaasGateway();
$gateway->setApiKey('$SUA_API_KEY_DO_ASAAS'); // Substitua pela sua chave de API do Asaas

// Criar um pagamento de teste
$response = $gateway->purchase([
    'customer' => 'ID_DO_CLIENTE', // Substitua pelo ID de um cliente cadastrado no Asaas
    'amount' => '100.00', // Valor do pagamento
    'installments' => 1, // Número de parcelas (1 = à vista)
    'billingType' => 'CREDIT_CARD', // Tipo de pagamento
    'creditCard' => [
        'number' => '4111111111111111', // Número de cartão de teste
        'expiryMonth' => '12',
        'expiryYear' => '2025',
        'cvv' => '123'
    ],
    'creditCardHolderInfo' => [
        'name' => 'Nome do Titular',
        'cpfCnpj' => '12345678900',
        'postalCode' => '01001000',
        'addressNumber' => '123',
        'phone' => '11999999999'
    ]
])->send();

if ($response->isSuccessful()) {
    echo "Pagamento criado com sucesso! ID da transação: " . $response->getTransactionReference();
} else {
    echo "Erro ao criar pagamento: " . $response->getMessage();
}

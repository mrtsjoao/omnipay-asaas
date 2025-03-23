<?php

namespace Omnipay\Asaas\Message;

use Omnipay\Common\Message\AbstractRequest;

class CaptureRequest extends AbstractRequest
{
    private $endpoint = 'https://www.asaas.com/api/v3/payments/{paymentId}/capture';

    public function getData()
    {
        return []; // O Asaas não exige um corpo para a captura, apenas o ID do pagamento.
    }

    public function sendData($data)
    {
        $paymentId = $this->getParameter('paymentId'); // Precisamos passar o ID da transação
        $httpResponse = $this->httpClient->request(
            'POST',
            str_replace('{paymentId}', $paymentId, $this->endpoint),
            [
                'Content-Type' => 'application/json',
                'access_token' => $this->getParameter('apiKey'),
            ]
        );

        return $this->response = new Response($this, json_decode($httpResponse->getBody(), true));
    }
}

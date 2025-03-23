<?php

namespace Omnipay\Asaas\Message;

use Omnipay\Common\Message\AbstractRequest;

class RefundRequest extends AbstractRequest
{
    private $endpoint = 'https://www.asaas.com/api/v3/payments/{paymentId}/refund';

    public function getData()
    {
        return [
            'value' => $this->getParameter('amount'), // Valor do estorno
        ];
    }

    public function sendData($data)
    {
        $paymentId = $this->getParameter('paymentId');
        $httpResponse = $this->httpClient->request(
            'POST',
            str_replace('{paymentId}', $paymentId, $this->endpoint),
            [
                'Content-Type' => 'application/json',
                'access_token' => $this->getParameter('apiKey'),
            ],
            json_encode($data)
        );

        return $this->response = new Response($this, json_decode($httpResponse->getBody(), true));
    }
}

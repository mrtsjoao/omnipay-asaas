<?php

namespace Omnipay\Asaas\Message;

use Omnipay\Common\Message\AbstractRequest;

class VoidRequest extends AbstractRequest
{
    private $endpoint = 'https://www.asaas.com/api/v3/payments/{paymentId}';

    public function getData()
    {
        return [];
    }

    public function sendData($data)
    {
        $paymentId = $this->getParameter('paymentId');
        $httpResponse = $this->httpClient->request(
            'DELETE',
            str_replace('{paymentId}', $paymentId, $this->endpoint),
            [
                'Content-Type' => 'application/json',
                'access_token' => $this->getParameter('apiKey'),
            ]
        );

        return $this->response = new Response($this, json_decode($httpResponse->getBody(), true));
    }
}

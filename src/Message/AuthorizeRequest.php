<?php

namespace Omnipay\Asaas\Message;

use Omnipay\Common\Message\AbstractRequest;

class AuthorizeRequest extends AbstractRequest
{
    public function getData()
    {
        return [
            'customer' => $this->getParameter('customer'),
            'billingType' => $this->getParameter('billingType'),
            'value' => $this->getParameter('value'),
            'dueDate' => $this->getParameter('dueDate'),
        ];
    }

    public function sendData($data)
    {
        $httpResponse = $this->httpClient->request('POST', 'https://www.asaas.com/api/v3/payments', [
            'headers' => [
                'Content-Type' => 'application/json',
                'access_token' => $this->getParameter('apiKey'),
            ],
            'body' => json_encode($data),
        ]);

        return $this->response = new Response($this, json_decode($httpResponse->getBody()->getContents(), true));
    }
}

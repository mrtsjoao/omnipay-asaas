<?php

namespace Omnipay\Asaas;

use Omnipay\Common\AbstractGateway;
use Omnipay\Asaas\Message\AuthorizeRequest;
use Omnipay\Asaas\Message\CaptureRequest;
use Omnipay\Asaas\Message\RefundRequest;
use Omnipay\Asaas\Message\VoidRequest;

class AsaasGateway extends AbstractGateway
{
    public function getName()
    {
        return 'Asaas';
    }

    public function getDefaultParameters()
    {
        return [
            'apiKey' => '',
        ];
    }

    public function setApiKey($value)
    {
        return $this->setParameter('apiKey', $value);
    }

    public function getApiKey()
    {
        return $this->getParameter('apiKey');
    }

    public function purchase(array $parameters = [])
    {
        return $this->createRequest(AuthorizeRequest::class, $parameters);
    }

    public function capture(array $parameters = [])
    {
        return $this->createRequest(CaptureRequest::class, $parameters);
    }

    public function refund(array $parameters = [])
    {
        return $this->createRequest(RefundRequest::class, $parameters);
    }

    public function void(array $parameters = [])
    {
        return $this->createRequest(VoidRequest::class, $parameters);
    }
}

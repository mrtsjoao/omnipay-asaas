<?php

namespace Omnipay\Asaas\Message;

use Omnipay\Common\Message\AbstractResponse;

class Response extends AbstractResponse
{
    public function isSuccessful()
    {
        return isset($this->data['id']);
    }

    public function getTransactionReference()
    {
        return $this->data['id'] ?? null;
    }
}

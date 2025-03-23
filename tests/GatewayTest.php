<?php

use Omnipay\Asaas\AsaasGateway;
use PHPUnit\Framework\TestCase;

class GatewayTest extends TestCase
{
    public function testGatewayInitialization()
    {
        $gateway = new AsaasGateway();
        $this->assertEquals('Asaas', $gateway->getName());
    }
}

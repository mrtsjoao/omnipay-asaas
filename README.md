
## Instalação

Para instalar o pacote e suas dependências, execute:

```sh
composer install
```

Caso esteja incluindo este pacote em outro projeto, você pode adicioná-lo via Composer:

```sh
composer require jvtod/omnipay-asaas
```

Após a instalação, atualize o autoload:

```sh
composer dump-autoload
```

## Configuração

Certifique-se de ter sua **API Key** do Asaas. Você pode obtê-la no painel da API do Asaas.

## Uso

### Inicializando o Gateway

```php
require 'vendor/autoload.php';

use Omnipay\Omnipay;

$gateway = Omnipay::create('Asaas');
$gateway->setApiKey('SUA_API_KEY_DO_ASAAS');
```

### Criando um Pagamento (Purchase)

```php
$response = $gateway->purchase([
    'customer'    => '123456789',
    'billingType' => 'CREDIT_CARD',
    'value'       => '100.00',
    'dueDate'     => date('Y-m-d', strtotime('+1 day')),
])->send();

if ($response->isSuccessful()) {
    echo "Pagamento autorizado! ID: " . $response->getTransactionReference();
} else {
    echo "Erro no pagamento: " . $response->getMessage();
}
```

### Capturar um Pagamento Autorizado

```php
$response = $gateway->capture([
    'transactionReference' => 'ID_DA_TRANSACAO'
])->send();
```

### Estornar um Pagamento

```php
$response = $gateway->refund([
    'transactionReference' => 'ID_DA_TRANSACAO'
])->send();
```

### Cancelar um Pagamento

```php
$response = $gateway->void([
    'transactionReference' => 'ID_DA_TRANSACAO'
])->send();
```

## Testes

Para rodar os testes unitários:

```sh
vendor/bin/phpunit tests
```

## Contribuição

Sinta-se à vontade para abrir issues ou enviar pull requests para melhorar este projeto!

## Licença

Este projeto é licenciado sob a **MIT License**. Veja o arquivo `LICENSE` para mais detalhes.


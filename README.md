
# TikTok Ads PHP Library

## Descrição

Este pacote PHP oferece uma interface simples para interagir com a **TikTok Ads API**, permitindo a criação de relatórios e integração com as funcionalidades do TikTok Ads. A biblioteca facilita a obtenção de dados como impressões, cliques, conversões e outras métricas importantes para o gerenciamento de campanhas publicitárias no TikTok.

## Instalação

Para instalar este pacote, use o Composer. Execute o seguinte comando em seu terminal dentro do diretório do seu projeto:

```bash
composer require victordevphp/tiktok-ads
```

## Requisitos

- PHP >= 8.2
- [GuzzleHttp](https://github.com/guzzle/guzzle) (>= 7.9) - Para comunicação HTTP com a API do TikTok.

## Contribuição

Se você deseja contribuir para este projeto, fique à vontade para enviar pull requests! Qualquer contribuição será muito bem-vinda.
<br>
<br>
<br>
<br>
<br>
# Metodos
## 1. Obter Relatório (`getReport`)

Este método recupera relatórios detalhados para um anunciante específico com base nos parâmetros fornecidos.

### Parâmetros:

- `advertiser_id` (string): ID do anunciante.
- `report_type` (string): Tipo de relatório (ex.: `BASIC`).
- `dimensions` (array): Dimensões para o agrupamento dos dados (ex.: `adgroup_id`).
- `data_level` (string): Nível dos dados (ex.: `AUCTION_ADGROUP`).
- `start_date` (string): Data de início no formato `YYYY-MM-DD`.
- `end_date` (string): Data de término no formato `YYYY-MM-DD`.
- `metrics` (array): Métricas a serem incluídas no relatório.

### Requisição:

```php
use TikTokAds\Report\ReportManager;

$reportManager = new ReportManager("SEU_TOKEN_DE_ACESSO");

$params = [
    'advertiser_id' => '0000000000000000000',
    'report_type' => 'BASIC',
    'dimensions' => ['adgroup_id'],
    'data_level' => 'AUCTION_ADGROUP',
    'start_date' => '2024-12-01',
    'end_date' => '2024-12-30',
    'metrics' => [
        "campaign_id", "campaign_name", "impressions", "clicks", "conversion", 
        "budget", "spend", "onsite_form", "onsite_shopping", 
        "onsite_initiate_checkout_count", "onsite_on_web_cart", "onsite_add_billing"
    ]
];

$response = $reportManager->getReport($params);
print_r($response);
```
### Resposta
```json
{
    "code": 0,
    "message": "OK",
    "request_id": "2025012214454248D365647",
    "data": {
        "list": [
            {
                "metrics": {
                    "conversion": 5,
                    "spend": 652.96,
                    "impressions": 76804,
                    "clicks": 9477,
                    "campaign_id": "00000000000000",
                    "campaign_name": "Leadfy - TikTok",
                    "onsite_on_web_cart": 0,
                    "onsite_form": 0,
                    "onsite_shopping": 0,
                    "budget": 35,
                    "onsite_initiate_checkout_count": 0,
                    "onsite_add_billing": 0
                },
                "dimensions": {
                    "adgroup_id": "000000000000"
                }
            }
        ],
        "page_info": {
            "total_number": 1,
            "total_page": 1,
            "page_size": 1,
            "page": 1
        }
    }
}
```
<br>
<br>

## 2. Obter Informações do Anunciante (`getInfo`)

Este método recupera informações básicas sobre um anunciante, como o saldo.

### Parâmetros:

- `advertiser_ids` (array): Array contendo o(s) ID(s) do(s) anunciante(s).
- `fields` (array): Campos que devem ser retornados (ex.: `balance`).

### Requisição:

```php
use TikTokAds\Advertiser\Advertiser;

$advertiser = new Advertiser("SEU_TOKEN_DE_ACESSO");

$params = [
    'advertiser_ids' => ['0000000000000000000'],
    'fields' => ["balance"]
];

$response = $advertiser->getInfo($params);
print_r($response);
```

### Resposta
```json
{
    "code": 0,
    "message": "OK",
    "request_id": "2025012214174179D49B0CE47F3",
    "data": {
        "list": [
            {
                "balance": 1000.0
            }
        ]
    }
}

```


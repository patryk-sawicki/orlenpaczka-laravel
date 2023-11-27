# OrlenPaczka API Client

Orlen Paczka API client for laravel.

## Requirements

* PHP 8.2 or higher with json extensions.

## Installation

The recommended way to install is through [Composer](http://getcomposer.org).

```bash
composer require patryk-sawicki/orlenpaczka-laravel
```

## Usage

Add to env:

```php
OP_API_ID = 'your_partner_id'
OP_API_KEY = 'your_partner_key'
OP_SANDBOX = false // optional - default false
OP_CACHE_DEFAULT_TTL = 86400 // optional - default 86400 seconds
```

Import class:

```php
use PatrykSawicki\OrlenPaczkaApi\app\Classes\OrlenPaczka;
```

### List of all points.

Get a list of all points.

```php
OrlenPaczka::giveMeAllRUCHWithFilled()->list(); // return array
```

Result:

```php
[
    [
        'DestinationCode' => 'WS-100001-27-26',
        'StreetName' => 'ANNOPOL 17 TEST',
        'City' => 'Warszawa',
        'District' => 'Warszawa',
        'Latitude' => '52.311519',
        'Longitude' => '21.013830',
        'Province' => 'Mazowieckie',
        'CashOnDelivery' => 'true',
        'OpeningHours' => 'Pn-Pt:00:00-24:00, So:00:00-24:00, Nd:00:00-24:00',
        'Location' => 'Punkt testowy',
        'PSD' => '100001',
        'PointType' => 'PSD',
        'Filled' => 'false',
        'Suggestions' => [],
        'Available' => 'true',
        'ZipCode' => '03-236',
    ],
    ...
]
```

## Changelog

Changelog is available [here](CHANGELOG.md).

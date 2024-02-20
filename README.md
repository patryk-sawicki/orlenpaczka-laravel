# OrlenPaczka API Client

Orlen Paczka API client for laravel.

## Requirements

* PHP 8.2 or higher with json extensions.

## Installation

The recommended way to install is through [Composer](http://getcomposer.org).

```bash
composer require patryk-sawicki/orlenpaczka-laravel
```

## Frontend Usage

### Map button

Add map button to your blade file.

```php
<x-op::map-button/>
```

Important:

1. You must add `@stack('after-css')` before `</head>` tag.
2. You must add `@stack('after-scripts')` before `</body>` tag.
3. Selected point will be saved in `#orlenPointId` input.

## Backend Usage

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

### Generate label business pack

Generate label for business pack.

```php
OrlenPaczka::generateLabelBusinessPack()->pdf(array $data); // return ?
```

Request:

```php
[
    [
        'DestinationCode' => 'WS-100001-27-26',
        'BoxSize' => 'S', // S, M, L
        'FirstName' => 'Jan',
        'LastName' => 'Kowalski',
        'PhoneNumber' => '123456789',
        'SenderEMail' => 'aaa@bbb.pl',
        'SenderFirstName' => 'Jan',
        'SenderLastName' => 'Kowalski',
        'SenderStreetName' => 'Testowa 1',
        'SenderBuildingNumber' => '1',
        'SenderCity' => 'Warszawa',
        'SenderPostCode' => '00-001',
        'SenderPhoneNumber' => '123456789',
        'PrintAdress' => '1', // 1, 2
        'PrintType' => '1', // 1, 2
    ],
    ...
]
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
        'ZipCode' => '03-236',
    ],
    ...
]
```

### Labels panel

Add a panel for generating labels.

```php
<x-op::labels-panel 
    :destination-code=""
    :firstName=""
    :lastName=""
    :phoneNumber=""
    :senderEMail=""
    :senderFirstName=""
    :senderLastName=""
    :senderStreetName=""
    :senderBuildingNumber=""
    :senderCity=""
    :senderPostCode=""
    :senderPhoneNumber=""
    :disc=""
    :dir=""
    :file=""
/>
```

## Changelog

Changelog is available [here](CHANGELOG.md).

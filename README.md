# HostedHooks PHP Package

A PHP package for [HostedHooks](https://www.hostedhooks.com),  a Webhooks as a Service Platform

## Installation

Use the package manager [composer](https://getcomposer.org/) to install the package.

```bash
composer require hostedhooks/hostedhooks-php
```

## How it works

### Initialization
Initialize the `HostedHooksClient` with your API key that is [found here](https://www.hostedhooks.com/settings/account)

```php
use HostedHooks\HostedHooksClient;

$hostedHooksClient = new HostedHooksClient('your-api-key');
```
### Resources available

* App
* Subscription
* Endpoint
* Webhook Event
* AppMessage
* SubscriptionMessage
* EndpointMessage

### App
```php
use HostedHooks\Resources\App;

$app = new App($hostedHooksClient);

// get all apps in your HostedHooks account
$app->list();

// create a new app in your HostedHooks account
$app->store(['name' => 'Awesome App']);

//update details of an existing app
$app->update($appId, ['name' => 'Updated awesome app name']); 
```
Read more about App resource [here](https://developers.hostedhooks.com/#apps)

### Subscription
```php
use HostedHooks\Resources\Subscription;

$subscription = new Subscription($hostedHooksClient);

// get all subscriptions for a given app
$subscription->list($appId);

// create a new subscription for a given app
$subscription->store($appId, $payload);

//get details for a single subscription
$subscription->show($subscriptionId);
```

Read more about Subscription resource [here](https://developers.hostedhooks.com/#subscriptions)

### Endpoint
```php
use HostedHooks\Resources\Endpoint;

$endpoint = new Endpoint($hostedHooksClient);

//get all endpoints for a given app
$endpoint->list($appId);

//get detail of a single endpoint for a given app
$endpoint->show($appId, $endpointId);

//create new endpoint for a given subscription providing array payload
$endpoint->store($subscriptionId, $payload);

//update an endpoint for a given subscription
$endpoint->update($subscriptionId, $endpointId, $payload);
```

Read more about Endpoint resource [here](https://developers.hostedhooks.com/#endpoints)

### WebhookEvent
```php
use HostedHooks\Resources\WebhookEvent;

$webhookEvent = new WebhookEvent($hostedHooksClient);

//list all webhook events for a given app
$webhookEvent->list($appId);
```

Read more about WebhookEvent resource [here](https://developers.hostedhooks.com/#webhook-events)

### AppMessage
```php
use HostedHooks\Resources\AppMessage;

$appMessage = new AppMessage($hostedHooksClient);

//create a new message for the given app
$appMessage->store($appId, $payload);
```

### SubscriptionMessage
```php
use HostedHooks\Resources\SubscriptionMessage;

$subscriptionMessage = new SubscriptionMessage($hostedHooksClient);

//create a new message for the given subscription
$subscriptionMessage->store($subscriptionId, $payload);
```

### EndpointMessage
```php
use HostedHooks\Resources\EndpointMessage;

$endpointMessage = new EndpointMessage($hostedHooksClient);

//create a new message for the given endpoint
$endpointMessage->store($endpointId, $payload);
```

Read more about Message resources [here](https://developers.hostedhooks.com/#messages)

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
This package is available as open source under the terms of the MIT License.
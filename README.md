# Silex PHP Twilio Service Provider

Twilio Service Provider for Twilio API and TwiML support in Silex

###### Use via composer from packagist.org

```text

"amassaro/silex-twilio-provider" => "dev-master"
```

###### Code Example

Place this in your bootstrap.php

```php

$app->register(new Amassaro\Silex\Twilio\TwilioServiceProvider(),
	array(
		'twilio.sid' => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
		'twilio.auth_token' => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
	)
);

```

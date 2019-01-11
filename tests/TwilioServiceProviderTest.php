<?php

//declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Silex\Application;
use Twilio\Twiml;
use Twilio\Rest\Client;
use Amassaro\Silex\Twilio\TwilioServiceProvider;

final class TwilioServiceProviderTest extends TestCase
{

	public function testContainerItemsNotNull(): void
	{

		$app = new Application;

		$app->register(new TwilioServiceProvider,
			[
				'twilio.sid' => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
				'twilio.auth_token' => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
			]
		);

		$this->assertNotNull($app['twilio.api']);
		$this->assertInstanceOf(Client::class, $app['twilio.api']);
		$this->assertNotNull($app['twilio.twiml']);
		$this->assertInstanceOf(Twiml::class, $app['twilio.twiml']);

	}

}
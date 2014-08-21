<?php

use Silex\Application;

use Amassaro\Silex\Twilio\TwilioServiceProvider;

class TwilioServiceProviderTest extends \PHPUnit_Framework_TestCase
{

	public function testContainerItemsNotNull()
	{

		$app = new Application();

		$app->register(new TwilioServiceProvider(),
			array(
				'twilio.sid' => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
				'twilio.auth_token' => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
			)
		);

		$app->boot();

		$this->assertNotNull($app['twilio.twiml']);
		$this->assertInstanceOf('\\Services_Twilio_Twiml', $app['twilio.twiml']);
		$this->assertNotNull($app['twilio.api']);
		$this->assertInstanceOf('\\Services_Twilio', $app['twilio.api']);

	}

}
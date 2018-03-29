<?php

namespace Amassaro\Silex\Twilio;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Twilio\Rest\Client;
use Twilio\Twiml;

/**
 * Twilio Service Provider for Twilio API and TwiML support in Silex.
 *
 * @author Anthony Massaro <me@anthonymassaro.com>
 */
class TwilioServiceProvider implements ServiceProviderInterface
{
    public function boot(Application $app)
    {

        $app['twilio.api'] = $app->share(function () use ($app) {

            if (empty($app['twilio.sid']))
            {
                throw new \Exception('twilio.sid is not defined!');
            }

            if (empty($app['twilio.auth_token']))
            {
                throw new \Exception('twilio.auth_token is not defined!');
            }

            return new Client($app['twilio.sid'], $app['twilio.auth_token']);
        });

        $app['twilio.twiml'] = $app->share(function () use ($app) {
            return new Twiml;
        });
    }

    public function register(Application $app)
    {

    }
}
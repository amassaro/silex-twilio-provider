<?php

namespace Amassaro\Silex\Twilio;

use Silex\Application;
use Silex\ServiceProviderInterface;

use Twilio\Services\Twilio;

/**
 * Twilio Service Provider for Twilio API and TwiML support in Silex.
 *
 * @author Anthony Massaro <me@anthonymassaro.com>
 */
class TwilioProvider implements ServiceProviderInterface
{
    public function boot(Application $app)
    {

        if (empty($app['twilio.sid']))
        {
            throw new Exception('twilio.sid is not defined!');
        }

        if (empty($app['twilio.auth_token']))
        {
            throw new Exception('twilio.auth_token is not defined!');
        }

        $app['twilio.api'] = $app->share(function () use ($app) {
            return new \Services_Twilio($app['twilio.sid'], $app['twilio.auth_token']);
        });

        $app['twilio.twiml'] = $app->share(function () use ($app) {
            return new \Services_Twilio_Twiml;
        });
    }

    public function register(Application $app)
    {

    }
}
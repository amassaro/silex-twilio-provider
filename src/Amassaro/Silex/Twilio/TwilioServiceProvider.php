<?php

namespace Amassaro\Silex\Twilio;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Twilio\Rest\Client;
use Twilio\Twiml;

/**
 * Twilio Service Provider for Twilio API and TwiML support in Silex.
 *
 * @author Anthony Massaro <me@anthonymassaro.com>
 */
class TwilioServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {

        $container['twilio.api'] = $container->protect(function () use ($container) {

            if (empty($container['twilio.sid']))
            {
                throw new \Exception('twilio.sid is not defined!');
            }

            if (empty($container['twilio.auth_token']))
            {
                throw new \Exception('twilio.auth_token is not defined!');
            }

            return new Client($container['twilio.sid'], $container['twilio.auth_token']);
        });

        $container['twilio.twiml'] = $container->protect(function () use ($container) {
            return new Twiml;
        });

    }
}
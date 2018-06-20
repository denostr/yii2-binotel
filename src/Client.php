<?php

namespace denostr\Binotel\yii;

use yii\base\BaseObject;
use yii\base\InvalidConfigException;

class Client extends BaseObject
{
    private $client = null;

    public $key = null;

    public $secret = null;

    public $apiHost = 'https://api.binotel.com/api/';

    public $apiVersion = '2.0';

    public $apiFormat = 'json';

    public $disableSSLChecks = false;

    public function init()
    {
        if (!class_exists('denostr\\Binotel\\yii\\Client')) {
            throw new InvalidConfigException('Binotel not found. Try to install it via composer require denostr/binotel-api');
        }
    }

    public function getClient()
    {
        if ($this->client == null) {
            $this->client = new \denostr\Binotel\Client(
                $this->key,
                $this->secret,
                $this->apiHost,
                $this->apiVersion,
                $this->apiFormat,
                $this->disableSSLChecks
            );
        }

        return $this->client;
    }

    public function __get($property)
    {
        return call_user_func([$this->getClient(), '__get'], $property);
    }
}

<?php

namespace denostr\Binotel\yii;

/**
 * Class Client
 * @package denostr\Binotel\yii
 * @link https://github.com/denostr/yii2-binotel
 * @link https://github.com/denostr/binotel-api
 */
class Client extends yii\base\BaseObject
{
    /**
     * Client object
     * @var null|\denostr\Binotel\Client
     */
    private $client = null;

    /**
     * API key
     * @var null|string
     */
    public $key = null;

    /**
     * API secret
     * @var null|string
     */
    public $secret = null;

    /**
     * API host
     * @var string
     */
    public $apiHost = 'https://api.binotel.com/api/';

    /**
     * API version
     * @var string
     */
    public $apiVersion = '2.0';

    /**
     * API format
     * @var string
     */
    public $apiFormat = 'json';

    /**
     * Option to disable SSL check
     * @var bool
     */
    public $disableSSLChecks = false;

    /**
     * Initialize component
     */
    public function init()
    {
        if (!class_exists('denostr\\Binotel\\yii\\Client')) {
            throw new yii\base\InvalidConfigException(
                'Binotel lib not found. Try to install it via composer require denostr/binotel-api'
            );
        }
    }

    /**
     * Get client object
     * @return \denostr\Binotel\Client|null
     */
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

    /**
     * @param $property
     * @return mixed
     */
    public function __get($property)
    {
        return call_user_func([$this->getClient(), '__get'], $property);
    }
}

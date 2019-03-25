<?php

namespace Yorkii\Shopify\Events;

use Yorkii\Shopify\Client;
use Yorkii\Shopify\Data;

abstract class Base extends Data
{
    /**
     * @var bool
     */
    protected $readOnly = true;

    /**
     * @var array
     */
    protected $requestData;

    /**
     * @var string
     */
    protected $topic;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $token;

    /**
     * @var Client
     */
    protected $client;

    public function __construct(Client $client, array $data = [])
    {
        $this->client = $client;

        parent::__construct($data);
    }

    /**
     * @return array
     */
    protected function getRequestData()
    {
        if ($this->requestData) {
            return $this->requestData;
        }

        $data = json_decode(file_get_contents('php://input'), true);

        if (null === $data) {
            $data = [];
        }

        $data = array_merge($data, $_POST, $_GET);

        return $this->requestData = $data;
    }

    /**
     * @param string $name
     * @param mixed $default
     *
     * @return mixed
     */
    protected function getInput($name, $default = null)
    {
        $data = $this->getRequestData();

        return isset($data[$name])
            ? $data[$name]
            : $default;
    }

    /**
     * @return $this
     */
    public function capture()
    {
        $this->id = $this->getInput('id');
        $this->token = $this->getInput('token');
        $this->data = $this->getRequestData();

        return $this;
    }

    /**
     * @return string
     */
    public function topic()
    {
        return static::EVENT_TOPIC;
    }
}
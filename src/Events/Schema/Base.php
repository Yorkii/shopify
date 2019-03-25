<?php

namespace Yorkii\Shopify\Events\Schema;

use Yorkii\Shopify\Client;
use Yorkii\Shopify\Data;

class Base extends Data
{
    /**
     * @var bool
     */
    protected $readOnly = true;

    /**
     * @var Client
     */
    protected $client;

    /**
     * Base constructor.
     *
     * @param Client $client
     * @param array $data
     */
    public function __construct(Client $client, array $data = [])
    {
        $this->client = $client;

        parent::__construct($data);
    }
}
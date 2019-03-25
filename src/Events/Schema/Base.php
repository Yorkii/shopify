<?php

namespace Yorki\Shopify\Events\Schema;

use Yorki\Shopify\Client;
use Yorki\Shopify\Data;

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
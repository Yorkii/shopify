<?php

namespace Yorkii\Shopify\Resources\Traits;

use Yorkii\Shopify\Collection;
use Yorkii\Shopify\Criteria\Base;

trait GetsAll
{
    /**
     * @param array $filters
     *
     * @return Collection
     */
    public function all($filters = [])
    {
        if ($filters instanceof Base) {
            $filters = $filters->toArray();
        }

        return $this->getCollectionFromResponse(
            $this->client->performGetRequest($this->getEndpointWithVariables() . '.json', $filters)
        );
    }
}
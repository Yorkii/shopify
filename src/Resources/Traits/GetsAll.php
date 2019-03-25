<?php

namespace Yorki\Shopify\Resources\Traits;

use Yorki\Shopify\Collection;
use Yorki\Shopify\Criteria\Base;

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
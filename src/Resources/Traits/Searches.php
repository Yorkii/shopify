<?php

namespace Yorki\Shopify\Resources\Traits;

use Yorki\Shopify\Collection;

trait Searches
{
    /**
     * @param string $query
     *
     * @return Collection
     */
    public function search($query)
    {
        return $this->getCollectionFromResponse(
            $this->client->performGetRequest(
                $this->getEndpointWithVariables() . '/search.json',
                [
                    'query' => $query,
                ]
            )
        );
    }
}
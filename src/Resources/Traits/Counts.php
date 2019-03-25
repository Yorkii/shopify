<?php

namespace Yorki\Shopify\Resources\Traits;

trait Counts
{
    /**
     * @param array $filters
     *
     * @return int
     */
    public function count(array $filters = [])
    {
        $response = $this->client->performGetRequest($this->getEndpointWithVariables() . '/count.json', $filters);
        $data = $response->toArray();

        return isset($data['count'])
            ? (int) $data['count']
            : null;
    }
}
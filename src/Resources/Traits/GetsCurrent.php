<?php

namespace Yorkii\Shopify\Resources\Traits;

trait GetsCurrent
{
    /**
     * @return $this|null
     */
    public function current()
    {
        $response = $this->client->performGetRequest(
            $this->getFilledSingleEndpoint(null, '/current.json')
        );

        return $this->fillFromResponse($response);
    }
}
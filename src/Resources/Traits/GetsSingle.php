<?php

namespace Yorki\Shopify\Resources\Traits;

trait GetsSingle
{
    /**
     * @param int $id
     *
     * @return $this|null
     */
    public function get($id)
    {
        return $this->fillFromResponse(
            $this->client->performGetRequest($this->getFilledSingleEndpoint($id))
        );
    }
}
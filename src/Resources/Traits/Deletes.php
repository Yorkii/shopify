<?php

namespace Yorki\Shopify\Resources\Traits;

trait Deletes
{
    /**
     * @param int $id
     *
     * @return bool
     */
    public function delete($id = null)
    {
        if (null === $id && null === $this->getData($this->getPrimaryKey())) {
            return false;
        }

        $response = $this->client->performDeleteRequest(
            $this->getFilledSingleEndpoint($id)
        );

        return $response->getStatusCode() === 200;
    }
}
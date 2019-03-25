<?php

namespace Yorki\Shopify\Resources\Traits;

trait Disables
{
    /**
     * @param int $id
     *
     * @throws \Exception
     *
     * @return bool
     */
    public function disable($id = null)
    {
        if (null === $id && null === $this->getData($this->getPrimaryKey())) {
            return false;
        }

        $idToRemove = $id;

        if (null === $idToRemove) {
            $idToRemove = $this->getData($this->getPrimaryKey());
        }

        $response = $this->client->performPostRequest(
            $this->getFilledSingleEndpoint($idToRemove, '/disable.json'),
            [
                $this->getSingleKey() => [
                    'id' => $idToRemove,
                ],
            ]
        );

        return $response->getStatusCode() === 201;
    }
}
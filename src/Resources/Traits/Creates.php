<?php

namespace Yorki\Shopify\Resources\Traits;

trait Creates
{
    /**
     * @param array $data
     *
     * @return bool
     */
    public function create(array $data)
    {
        $response = $this->client->performPostRequest(
            $this->getFilledSingleEndpoint(),
            [
                $this->getSingleKey() => $data,
            ]
        );

        if ($response->getStatusCode() !== 201) {
            return false;
        }

        $responseData = $response->toArray();

        $this->changedData = [];
        $this->data = $data;

        if (isset($responseData[$this->getSingleKey()]['id'])) {
            $this->data['id'] = $responseData[$this->getSingleKey()]['id'];
        }

        return true;
    }
}
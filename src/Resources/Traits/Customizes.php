<?php

namespace Yorkii\Shopify\Resources\Traits;

trait Customizes
{
    /**
     * @param array $data
     * @param int $id
     *
     * @return bool
     */
    public function customize($data = [], $id = null)
    {
        return $this->singlePutWithSuccess($id, 'customize', [
            $this->getSingleKey() => $data,
        ]);
    }
}
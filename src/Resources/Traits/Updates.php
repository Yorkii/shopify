<?php

namespace Yorkii\Shopify\Resources\Traits;

trait Updates
{
    /**
     * @param int $id
     * @param array $data
     *
     * @return bool
     */
    public function update($id, array $data)
    {
        return $this->singlePutWithSuccess($id, null, [
            $this->getSingleKey() => $data,
        ]);
    }
}
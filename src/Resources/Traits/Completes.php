<?php

namespace Yorki\Shopify\Resources\Traits;

trait Completes
{
    /**
     * @param int $id
     * @param array
     *
     * @throws \Exception
     *
     * @return bool
     */
    public function complete($params = [], $id = null)
    {
        return $this->singlePutWithSuccess($id, 'complete', $params);
    }
}
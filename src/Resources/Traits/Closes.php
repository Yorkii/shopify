<?php

namespace Yorki\Shopify\Resources\Traits;

trait Closes
{
    /**
     * @param int $id
     * @param array $params
     *
     * @throws \Exception
     *
     * @return bool
     */
    public function close($params = [], $id = null)
    {
        return $this->singlePostWithSuccess($id, 'close', $params);
    }
}
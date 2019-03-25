<?php

namespace Yorkii\Shopify\Resources\Traits;

trait Opens
{
    /**
     * @param int $id
     *
     * @throws \Exception
     *
     * @return bool
     */
    public function open($id = null)
    {
        return $this->singlePostWithSuccess($id, 'open');
    }
}
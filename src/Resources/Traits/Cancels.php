<?php

namespace Yorki\Shopify\Resources\Traits;

trait Cancels
{
    /**
     * @param int $id
     *
     * @throws \Exception
     *
     * @return bool
     */
    public function cancel($id = null)
    {
        return $this->singlePostWithSuccess($id, 'cancel');
    }
}
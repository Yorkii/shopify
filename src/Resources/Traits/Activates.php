<?php

namespace Yorkii\Shopify\Resources\Traits;

trait Activates
{
    /**
     * @param int $id
     *
     * @return bool
     */
    public function activate($id = null)
    {
        return $this->singlePostWithSuccess($id, 'activate');
    }
}
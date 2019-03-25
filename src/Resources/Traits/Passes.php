<?php

namespace Yorkii\Shopify\Resources\Traits;

trait Passes
{
    /**
     * @return array
     */
    public function passes()
    {
        if (property_exists($this, 'passes')) {
            return $this->passes;
        }

        return [];
    }
}
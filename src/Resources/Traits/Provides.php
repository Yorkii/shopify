<?php

namespace Yorki\Shopify\Resources\Traits;

trait Provides
{
    /**
     * @return array
     */
    public function provides()
    {
        $provides = [];

        if (property_exists($this, 'provides')) {
            $provides = $this->provides;
        }

        return $provides;
    }
}